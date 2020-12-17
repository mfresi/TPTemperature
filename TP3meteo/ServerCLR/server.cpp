#include "server.h"
#include <winsock2.h>
#include <stdio.h>
#include <stdlib.h>
#pragma comment(lib, "ws2_32.lib")
#include <iostream>
#include <string>

using namespace std;

server::server()
{
	WSADATA wsa;
	WSAStartup(MAKEWORD(2, 2), &wsa);

	sock = socket(AF_INET, SOCK_STREAM, 0);
}

int server::bindServer()
{
	SOCKADDR_IN sin = { 0 };

	sin.sin_addr.s_addr = htonl(INADDR_ANY); /* nous sommes un serveur, nous acceptons n'importe quelle adresse */

	sin.sin_family = AF_INET;

	sin.sin_port = htons(1234);

	if (bind(sock, (SOCKADDR *)&sin, sizeof sin) == SOCKET_ERROR)
	{
		return false;
	}
	return true;
}

int server::acceptCom()
{
	listen(sock, 5);

	SOCKADDR_IN csin = { 0 };

	int sinsize = sizeof csin;

	csock = accept(sock, (SOCKADDR *)&csin, &sinsize);

	if (csock == INVALID_SOCKET)
	{
		return false;
	}
	return true;
}

int server::recupToClient(char * c, int taille)
{
	int n;

	n = recv(csock, c, taille, 0);

	if (n == SOCKET_ERROR)
	{
		return false;
	}
	return true;
}

int server::sendToClient(char * msg, int length)
{
	bool resultSend;

	resultSend = send(csock, msg, length, 0);

	if (resultSend == -1)
	{
		return false;
	}
	return true;
}

int server::closeSocket()
{
	bool result1;
	bool result2;

	result1 = closesocket(sock);
	result2 = closesocket(csock);

	if (result1 == SOCKET_ERROR && result2 == SOCKET_ERROR)
	{
		return false;
	}
	return true;
}