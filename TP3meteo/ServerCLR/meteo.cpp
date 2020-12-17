#include "meteo.h"

using namespace std;

meteo::meteo() {
	WSADATA wsa;
	WSAStartup(MAKEWORD(2, 2), &wsa);
	sock = socket(AF_INET, SOCK_STREAM, 0);
	buffer = new char[1024];
}
bool meteo::TCPconnexion(int PORT) {

	SOCKADDR_IN sin = { 0 };

	sin.sin_addr.s_addr = htonl(INADDR_ANY); /* nous sommes un serveur, nous acceptons n'importe quelle adresse */

	sin.sin_family = AF_INET;

	sin.sin_port = htons(PORT);

	if (bind(sock, (SOCKADDR *)&sin, sizeof sin) == SOCKET_ERROR)
	{
		return false;
	}
	if (listen(sock, 5) == SOCKET_ERROR)
	{
		return false;
	}
	return true;
}

bool meteo::TCPWaitConnexion()
{
	SOCKADDR_IN csin = { 0 };
	int sinsize = sizeof csin;
	csock = accept(sock, (SOCKADDR *)&csin, &sinsize);

	if (csock == INVALID_SOCKET)
	{
		return false;
	}
	return true;
}

bool meteo::TCPsend(char * buffer, int len) {

	if (send(csock, buffer, len, 0) < 0)
	{
		return false;
	}
	return true;
}
bool meteo::TCPrecv(char * buffer, int len) {

		int n = 0;

	if ((n = recv(csock, buffer, len, 0)) <= 0)
	{
		return false;
	}

	buffer[n] = '\0';
	return true;
}

bool meteo::TCPclose() {
	closesocket(sock);
	closesocket(csock);
	return true;
}

