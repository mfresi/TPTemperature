#pragma once
#include <winsock2.h> 
#include <stdio.h>
#include "K8055.h"
#pragma comment(lib,  "ws2_32.lib")
class meteo
{

private:
	SOCKET sock;
	SOCKET csock;
	char *buffer;
public:
	meteo();
	bool TCPconnexion(int PORT);
	bool TCPWaitConnexion();
	bool TCPsend(char *buffer, int len);
	bool TCPrecv(char *buffer, int len);
	bool TCPclose();
};

