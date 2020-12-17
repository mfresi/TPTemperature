// ConsoleApplication1.cpp : Ce fichier contient la fonction 'main'. L'exécution du programme commence et se termine à cet endroit.
//

#include <iostream>
#include <string>
#include "meteo.h"
#include "K8055.h"
#include "server.h"
#include <tchar.h>
#include <stdio.h>
#include <stdlib.h>

using namespace std;

int main()
{
	server server;
	meteo * weather = new meteo();
	bool resultBindServ;
	bool resultRead;
	bool resultSend;
	char data[100];
	char tempDegre[50] = "";
	char tempFar[20] = "";
	bool TCP;
	int port = 1234;
	bool etat = true;
	
	do {
		int handle = K8055::OpenDevice(0);
		float valueConv = K8055::ReadAnalogChannel(1);
		float temperatureDegre = ((valueConv / 255.0) * 90) - 30;
		float temperatureFarenheit = ((((valueConv / 255.0) * 90) - 30) * 1.8) + 32;
		if (temperatureDegre == -30)
		{
			temperatureDegre = 0;
		}
		sprintf_s(tempDegre, "%f", temperatureDegre);
		sprintf_s(tempFar, "%f", temperatureFarenheit);

		resultBindServ = server.bindServer();
		server.acceptCom();

		if (resultBindServ == true)
		{
			cout << "la connexion client/server OK" << endl;
		}
		else
		{
			cout << "pas reussi a bind server/client" << endl;
		}

		resultRead = server.recupToClient(data, 3);

		if (resultRead == true)
		{
			cout << "la trame recu est : " << data << endl;
		}
		else
		{
			cout << "pas reussi a lire" << endl;
		}

		if (data[0] == 'T' && data[1] == 'd')
		{
			resultSend = server.sendToClient(tempDegre, 9);
			cout << "la trame envoye est : " << tempDegre << endl;
			etat = true;
		}
		else if (data[0] == 'T' && data[1] == 'f')
		{
			resultSend = server.sendToClient(tempFar, 9);
			cout << "la trame envoye est : " << tempFar << endl;
			etat = true;
		}
		else
		{
		cout << "demande pour close le server" << endl;
		resultSend = server.sendToClient("Close", 5);
		etat = false;
		}
		if (resultSend == true)
		{
			cout << "envoie au client reussi" << endl;
		}
		else
		{
			cout << "pas reussi a envoyer" << endl;
		}

	} while (etat == true);
}

// Exécuter le programme : Ctrl+F5 ou menu Déboguer > Exécuter sans débogage
// Déboguer le programme : F5 ou menu Déboguer > Démarrer le débogage

// Astuces pour bien démarrer : 
//   1. Utilisez la fenêtre Explorateur de solutions pour ajouter des fichiers et les gérer.
//   2. Utilisez la fenêtre Team Explorer pour vous connecter au contrôle de code source.
//   3. Utilisez la fenêtre Sortie pour voir la sortie de la génération et d'autres messages.
//   4. Utilisez la fenêtre Liste d'erreurs pour voir les erreurs.
//   5. Accédez à Projet > Ajouter un nouvel élément pour créer des fichiers de code, ou à Projet > Ajouter un élément existant pour ajouter des fichiers de code existants au projet.
//   6. Pour rouvrir ce projet plus tard, accédez à Fichier > Ouvrir > Projet et sélectionnez le fichier .sln.
