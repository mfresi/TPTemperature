#pragma once
#include "server.h"
#include <winsock2.h>
#include <stdio.h>
#include <stdlib.h>
#pragma comment(lib, "ws2_32.lib")
#include <iostream>
#include <string>

ref class server
{
private:
	SOCKET sock;
	SOCKET csock;

public:
	server();
	int bindServer();
	int acceptCom();
	int sendToClient(char * msg, int length);
	int recupToClient(char * c, int taille);
	int closeSocket();
};

