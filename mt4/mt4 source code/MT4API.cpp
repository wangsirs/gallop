//+------------------------------------------------------------------+
//|                                         MetaTrader 4 Manager API |
//|                   Copyright 2001-2014, MetaQuotes Software Corp. |
//|                                        http://www.metaquotes.net |
//+------------------------------------------------------------------+
#include "stdafx.h"
#include "MT4ManagerAPI.h"
//+------------------------------------------------------------------+
//|                                                                  |
//+------------------------------------------------------------------+
class CManager
{
private:
	CManagerFactory   m_factory;
	CManagerInterface *m_manager;

public:
	CManager() : m_factory("mtmanapi.dll"), m_manager(NULL)
	{
		m_factory.WinsockStartup();
		if (m_factory.IsValid() == FALSE || (m_manager = m_factory.Create(ManAPIVersion)) == NULL)
		{
			printf("Failed to create MetaTrader 4 Manager API interface\n");
			return;
		}
	}

	~CManager()
	{
		if (m_manager != NULL)
		{
			if (m_manager->IsConnected())
				m_manager->Disconnect();
			m_manager->Release();
			m_manager = NULL;
		}
		m_factory.WinsockCleanup();
	}

	bool IsValid()
	{
		return(m_manager != NULL);
	}

	CManagerInterface* operator->()
	{
		return(m_manager);
	}
};

void replaceStr(std::string& str, const std::string& oldStr, const std::string& newStr) {
	size_t pos = 0;
	while ((pos = str.find(oldStr, pos)) != std::string::npos) {
		str.replace(pos, oldStr.length(), newStr);
		pos += newStr.length();
	}
}

//+------------------------------------------------------------------+
//| Reading number parameter                                         |
//+------------------------------------------------------------------+
int GetIntParam(LPCSTR string, LPCSTR param, int *data)
{
	//---- checks
	if (string == NULL || param == NULL || data == NULL) return(FALSE);
	//---- find
	if ((string = strstr(string, param)) == NULL)       return(FALSE);
	//---- all right
	*data = atoi(&string[strlen(param)]);
	return(TRUE);
}

//+------------------------------------------------------------------+
//| Reading long integer parameter                                         |
//+------------------------------------------------------------------+
long GetLongIntParam(LPCSTR string, LPCSTR param, long *data)
{
	//---- checks
	if (string == NULL || param == NULL || data == NULL) return(FALSE);
	//---- find
	if ((string = strstr(string, param)) == NULL)       return(FALSE);
	//---- all right
	*data = atol(&string[strlen(param)]);
	return(TRUE);
}

//+------------------------------------------------------------------+
//| Reading floating parameter                                       |
//+------------------------------------------------------------------+
int GetFltParam(LPCSTR string, LPCSTR param, double *data)
{
	//---- checks
	if (string == NULL || param == NULL || data == NULL) return(FALSE);
	//---- find
	if ((string = strstr(string, param)) == NULL)       return(FALSE);
	//---- all right
	*data = atof(&string[strlen(param)]);
	return(TRUE);
}
//+------------------------------------------------------------------+
//| Reading string parameter                                         |
//+------------------------------------------------------------------+
int GetStrParam(LPCSTR string, LPCSTR param, char *buf, const int maxlen)
{
	int i = 0;
	//---- checks
	if (string == NULL || param == NULL || buf == NULL)  return(FALSE);
	//---- find
	if ((string = strstr(string, param)) == NULL)       return(FALSE);
	//---- receive result
	string += strlen(param);
	while (*string != 0 && *string != '|' && i<maxlen) { *buf++ = *string++; i++; }
	*buf = 0;
	//----
	return(TRUE);
}

void logToFile(LPCSTR log) {
	time_t t = time(0);   // get time now
	struct tm * now = localtime(&t);
	char buffer[40];
	ofstream outfile;
	outfile.open(LOG_FILE, ios_base::app);

	strftime(buffer, 80, "[%Y-%m-%d %H:%M:%S] ", now);
	string str(buffer);
	outfile << buffer << log;
	return;
}
//+------------------------------------------------------------------+
//|                                                                  |
//+------------------------------------------------------------------+
int main(int argc, char* argv[])
{
	int r;
	WSAData wsaData;
	WORD DLLVSERION;
	DLLVSERION = MAKEWORD(2, 1);//Winsocket-DLL 版本

								//用 WSAStartup 開始 Winsocket-DLL
	r = WSAStartup(DLLVSERION, &wsaData);

	//宣告 socket 位址資訊(不同的通訊,有不同的位址資訊,所以會有不同的資料結構存放這些位址資訊)
	SOCKADDR_IN addr;
	int addrlen = sizeof(addr);

	//建立 socket
	SOCKET sListen; //listening for an incoming connection
	SOCKET sConnect; //operating if a connection was found

					 //AF_INET：表示建立的 socket 屬於 internet family
					 //SOCK_STREAM：表示建立的 socket 是 connection-oriented socket 
	sConnect = socket(AF_INET, SOCK_STREAM, NULL);

	//設定位址資訊的資料
	addr.sin_addr.s_addr = inet_addr(HOST_IP);
	addr.sin_family = AF_INET;
	addr.sin_port = htons(HOST_PORT);

	//設定 Listen
	sListen = socket(AF_INET, SOCK_STREAM, NULL);
	bind(sListen, (SOCKADDR*)&addr, sizeof(addr));
	listen(sListen, SOMAXCONN);//SOMAXCONN: listening without any limit

	 //等待連線
	SOCKADDR_IN clinetAddr;

	int          res = RET_ERROR;

	char *hostname = _LOGIN_HOST;
	char *login_id = _LOGIN_ID;
	char *login_pw = _LOGIN_PW;
	char opcode[40] = { 0 };
	char logStr[512] = { 0 };
	int dst_enabled;
	int tz_offset;
	int custom_offset;
	int total_offset;
	CManager manager;
	if (!manager.IsValid()) return(-1);
	if ((res = manager->Connect(hostname)) != RET_OK || (res = manager->Login(atoi(login_id), login_pw)) != RET_OK)
	{
		_snprintf(logStr, sizeof(logStr), "Connect to %s as '%s' failed (%s)\n", hostname, login_id, manager->ErrorDescription(res));
		logToFile(logStr);
		return(-1);
	}

	ConCommon sys_com_config;
	manager->CfgRequestCommon(&sys_com_config);
	dst_enabled = sys_com_config.daylightcorrection;
	tz_offset = sys_com_config.timezone;

	#ifdef CUSTOM_TZ_OFFSET
		custom_offset = CUSTOM_TZ_OFFSET;
	#else
		custom_offset = 0;
	#endif

	total_offset = (custom_offset - dst_enabled - tz_offset) * 3600;
	_snprintf(logStr, sizeof(logStr), "Common configurations: DST = %d, TIMEZONE = %d, CUSTOM = %d\n", sys_com_config.daylightcorrection, sys_com_config.timezone, custom_offset);
	logToFile(logStr);
	while (true) {
		try {
			_snprintf(logStr, sizeof(logStr), "Local server listening ... \n");
			logToFile(logStr);
			if (sConnect = accept(sListen, (SOCKADDR*)&clinetAddr, &addrlen))
			{
				char *tmp;
				char sendbuf[10240] = {0};
				char messages[1024];
				ZeroMemory(messages, 1024);
				//接收client端訊息
				recv(sConnect, messages, sizeof(messages), 0);
				_snprintf(logStr, sizeof(logStr), "Receive connection from %s\nStream buffer = %s\n", inet_ntoa(addr.sin_addr), messages);
				logToFile(logStr);
				if (!manager->IsConnected()) {
					if ((res = manager->Connect(hostname)) != RET_OK || (res = manager->Login(atoi(login_id), login_pw)) != RET_OK)
					{
						_snprintf(logStr, sizeof(logStr), "Connect to %s as '%s' failed (%s)\n", hostname, login_id, manager->ErrorDescription(res));
						logToFile(logStr);
						char * sendbuf = "-1\r\nend\r\n";
						send(sConnect, sendbuf, sizeof(sendbuf), 0);
						continue;
					}
				}
				if (strstr((const char *)messages, "OP=") != NULL) {
					char* buffer;

					string strBuf = messages;
					replaceStr(strBuf, "__", " "); //將"__"替換成space
					buffer = (char*)strBuf.c_str();

					//取得OP code 指令
					GetStrParam(buffer, "OP=", opcode, sizeof(opcode) - 1);
					_snprintf(logStr, sizeof(logStr), "Received stream contains op = %s\n", opcode);
					logToFile(logStr);
					if (strcmp(opcode, "add_mt4_user") == 0) {
						double deposit = 0;
						UserRecord user = { 0 };
						user.enable = TRUE;
						user.enable_change_password = TRUE;
						user.user_color = 0xff000000;
						GetStrParam(buffer, "GROUP=", user.group, sizeof(user.group) - 1);
						GetStrParam(buffer, "NAME=", user.name, sizeof(user.name) - 1);
						GetStrParam(buffer, "PASSWORD=", user.password, sizeof(user.password) - 1);
						GetStrParam(buffer, "READ_PASSWORD=", user.password_investor, sizeof(user.password_investor) - 1);
						GetStrParam(buffer, "EMAIL=", user.email, sizeof(user.email) - 1);
						GetStrParam(buffer, "COUNTRY=", user.country, sizeof(user.country) - 1);
						GetStrParam(buffer, "STATE=", user.state, sizeof(user.state) - 1);
						GetStrParam(buffer, "CITY=", user.city, sizeof(user.city) - 1);
						GetStrParam(buffer, "ADDRESS=", user.address, sizeof(user.address) - 1);
						GetStrParam(buffer, "COMMENT=", user.comment, sizeof(user.comment) - 1);
						GetStrParam(buffer, "PHONE=", user.phone, sizeof(user.phone) - 1);
						GetStrParam(buffer, "PHONE_PASSWORD=", user.password_phone, sizeof(user.password_phone) - 1);
						GetStrParam(buffer, "STATUS=", user.status, sizeof(user.status) - 1);
						GetStrParam(buffer, "ZIPCODE=", user.zipcode, sizeof(user.zipcode) - 1);
						GetStrParam(buffer, "ID=", user.id, sizeof(user.id) - 1);
						GetIntParam(buffer, "ID=", &user.login);
						GetIntParam(buffer, "LEVERAGE=", &user.leverage);
						GetIntParam(buffer, "AGENT=", &user.agent_account);
						GetIntParam(buffer, "SEND_REPORTS=", &user.send_reports);
						GetFltParam(buffer, "DEPOSIT=", &deposit);

						//Check whether login ID exists
						int arrLength = 1;
						UserRecord* userInfo = manager->UserRecordsRequest(&user.login, &arrLength);
						if (userInfo != NULL) {
							if (strlen(userInfo->id) != 0) {
								_snprintf(sendbuf, sizeof(sendbuf), "13\r\n");
							}
						}
						else {
							int ret = manager->UserRecordNew(&user);
							_snprintf(sendbuf, sizeof(sendbuf), "%d\r\n", ret);
						}
					}
					else if (strcmp(opcode, "check_id_exists") == 0) {
						int loginID;
						GetIntParam(buffer, "ID=", &loginID);
						//Check whether login ID exists
						int arrLength = 1;
						UserRecord* userInfo = manager->UserRecordsRequest(&loginID, &arrLength);
						if (userInfo != NULL) {
							if (strlen(userInfo->id) != 0) {
								_snprintf(sendbuf, sizeof(sendbuf), "13\r\n");
							}
						}
						else {
							_snprintf(sendbuf, sizeof(sendbuf), "0\r\n");
						}
					}
					else if (strcmp(opcode, "client_funding") == 0 ||
						strcmp(opcode, "client_withdraw") == 0) {
						int loginID;
						int amount;
						GetIntParam(buffer, "ID=", &loginID);
						GetIntParam(buffer, "AMOUNT=", &amount);
						TradeTransInfo info = { 0 };
						info.type = TT_BR_BALANCE;
						info.cmd = OP_BALANCE;
						info.orderby = loginID;
						info.price = amount;
						bool isInsuffBal = false;
						//針對出金部分檢查客戶餘額狀況，若餘額不足，則回傳 30 error code
						if (strcmp(opcode, "client_withdraw") == 0) {
							int arrLength = 1;
							UserRecord* userInfo = manager->UserRecordsRequest(&loginID, &arrLength);
							double user_balance = userInfo->balance;
							if (userInfo != NULL) {
								if (userInfo->balance < 0 || abs(amount) > userInfo->balance) {
									isInsuffBal = true;
									_snprintf(logStr, sizeof(logStr), "Insufficient client withdraw, balance = %f, money taken = %d\r\n", user_balance, amount);
									logToFile(logStr);
									_snprintf(sendbuf, sizeof(sendbuf), "30\r\n");
								}
							}
						}
						if (!isInsuffBal) {
							int ret = manager->TradeTransaction(&info);
							if (ret == RET_OK) {
								_snprintf(sendbuf, sizeof(sendbuf), "0\r\n");
							}
							else {
								_snprintf(sendbuf, sizeof(sendbuf), "%d\r\n", ret);
							}
						}
					}else if (strcmp(opcode, "get_client_asset") == 0) {
						int loginID;
						GetIntParam(buffer, "ID=", &loginID);
						int arrLength = 1;
						UserRecord* userInfo = manager->UserRecordsRequest(&loginID, &arrLength);
						if (userInfo != NULL) {
							_snprintf(sendbuf, sizeof(sendbuf), "%f\r\n", userInfo->balance);
						}
						else {
							_snprintf(sendbuf, sizeof(sendbuf), "-1\r\n");
						}
					}else if (strcmp(opcode, "get_client_trade_history") == 0) {
						int loginID;
						long from;
						long to;
						GetIntParam(buffer, "ID=", &loginID);
						GetLongIntParam(buffer, "FROM=", &from);
						GetLongIntParam(buffer, "TO=", &to);
						if(from >= (long)total_offset)
							from -= (long)total_offset;
						if(to >= (long)total_offset)
							to -= (long)total_offset;
						_snprintf(logStr, sizeof(logStr), "Trade history modified from = %ld, to = %ld", from, to);
						logToFile(logStr);
						int total;
						TradeRecord* orders;
						orders = manager->TradesUserHistory(loginID, from, to, &total);
						while (orders != NULL) {
							int offset = 0;
							for (int i = 0; i < total; i++) {
								//忽略CMD=6或7, 分別為出入金、更改信用指令
								if (orders[i].cmd == 6 || orders[i].cmd == 7) {
									continue;
								}
								offset += _snprintf(offset + sendbuf, sizeof(sendbuf), "%d,%d,%s,%d,%f,%ld,%f,%ld,%s,%f\r\n",
									orders[i].order,
									orders[i].cmd,
									orders[i].symbol,
									orders[i].volume,
									orders[i].open_price,
									(orders[i].open_time + total_offset),
									orders[i].close_price,
									(orders[i].close_time + total_offset),
									orders[i].comment,
									orders[i].profit
								);
							}
							orders = orders->next;
						}
						manager->MemFree(orders);
					}
					else if (strcmp(opcode, "get_access_payment") == 0) {
						int loginID;
						long from;
						long to;
						GetIntParam(buffer, "ID=", &loginID);
						GetLongIntParam(buffer, "FROM=", &from);
						GetLongIntParam(buffer, "TO=", &to);
						if(from >= (long)total_offset)
							from -= (long)total_offset;
						if(to >= (long)total_offset)
							to -= (long)total_offset;
						int total;
						TradeRecord* orders;
						orders = manager->TradesUserHistory(loginID, from, to, &total);
						while (orders != NULL) {
							int offset = 0;
							for (int i = 0; i < total; i++) {
								//只考慮cmd = 6, 出入金情況
								if (orders[i].cmd == 6) {
									offset += _snprintf(offset + sendbuf, sizeof(sendbuf), "%d,%ld,%s,%f\r\n",
										orders[i].order,
										(orders[i].timestamp + total_offset),
										orders[i].comment,
										orders[i].profit
										);
								}
							}
							orders = orders->next;
						}
						manager->MemFree(orders);
					}
					else if (strcmp(opcode, "ping_remote") == 0) {
						int ret = manager->Ping();
						_snprintf(sendbuf, sizeof(sendbuf), "%d\r\n", ret);
					}
					else if (strcmp(opcode, "change_pw") == 0) {
						int pwType;
						int loginID;
						char passwd[128];
						GetIntParam(buffer, "TYPE=", &pwType);
						GetIntParam(buffer, "ID=", &loginID);
						GetStrParam(buffer, "PASSWD=", passwd, sizeof(passwd) - 1);
						int ret = manager->UserPasswordSet(loginID, passwd, pwType, 1);
						_snprintf(sendbuf, sizeof(sendbuf), "%d\r\n", ret);
					}
					else if (strcmp(opcode, "get_all_symbols") == 0) {
						int total = 0;
						int offset = 0;
						ConSymbol* cs = {};
						ConSymbolGroup* csg = new ConSymbolGroup[MAX_SEC_GROUPS];
						manager->SymbolsRefresh();
						manager->SymbolsGroupsGet(csg);
						cs = manager->SymbolsGetAll(&total);
						for (int i = 0; i < total; i++) {
							int sec_type = cs[i].type;
							offset += _snprintf(offset + sendbuf, sizeof(sendbuf), "%s,%s,%d\r\n",
								cs[i].symbol,
								csg[sec_type].name,
								cs[i].count
								);
						}
						manager->MemFree(cs);
						manager->MemFree(csg);
					}
					else if (strcmp(opcode, "add_group") == 0) {
						char group_name[16], support_page[128];
						int total, i, enable, simple_mode, index;
						GetStrParam(buffer, "GROUP=", group_name, sizeof(group_name) - 1);
						ConGroup* cg = manager->CfgRequestGroup(&total);
						for (i = 0; i < total; i++) {
							if (strcmp(cg[i].group,DUP_GROUP) == 0) {
								_snprintf(logStr, sizeof(logStr), "Index = %d, group name = %s, enable = %d", i, cg[i].group, cg[i].enable );
								logToFile(logStr);
								index = i;
							}
							else if (strcmp(cg[i].group, group_name) == 0) {
								_snprintf(logStr, sizeof(logStr), "Index = %d, group name = %s, enable = %d", i, cg[i].group, cg[i].enable);
								logToFile(logStr);
								index = i;
								break;
							}
						}
						i = index;
						GetIntParam(buffer, "MODE=", &simple_mode);
						strcpy(cg[i].group, group_name);
						if (simple_mode == 0) {
							GetStrParam(buffer, "SUPPORT_PAGE=", support_page, sizeof(support_page) - 1);
							GetIntParam(buffer, "ENABLE=", &enable);
							strcpy(cg[i].support_page, support_page);
							cg[i].enable = enable;
						}
						cg[i].default_leverage = DEF_LEVERAGE;
						//modify all security groups to be disabled.
						int j = 0;
						for (j = 0; j < MAX_SEC_GROUPS; j++) {
							cg[i].secgroups[j].trade = 0;
							cg[i].secgroups[j].show = 0;
						}
						int ret = manager->CfgUpdateGroup(&cg[i]);
						if (ret == RET_OK) {
							_snprintf(sendbuf, sizeof(sendbuf), "0\r\n");
						}
						else {
							_snprintf(sendbuf, sizeof(sendbuf), "%d\r\n", ret);
						}
						manager->MemFree(cg);
					}
					else if (strcmp(opcode, "edit_symbol_group") == 0) {
						char group_name[16];
						char symbol_group[16];
						int enable, spread, i, total;
						GetStrParam(buffer, "GROUP=", group_name, sizeof(group_name) - 1);
						GetStrParam(buffer, "NAME=", symbol_group, sizeof(symbol_group) - 1);
						GetIntParam(buffer, "ENABLE=", &enable);
						GetIntParam(buffer, "SPREAD=", &spread);
						BOOLEAN is_edit_success = FALSE;
						ConGroup* cg = manager->CfgRequestGroup(&total);
						for (i = 0; i < total; i++) {
							if (strcmp(cg[i].group, group_name) == 0) {
								break;
							}
						}

						ConSymbolGroup* csg = new ConSymbolGroup[MAX_SEC_GROUPS];
						manager->CfgRequestSymbolGroup(csg);
						int j;
						for (j = 0; j < MAX_SEC_GROUPS; j++) {
							_snprintf(logStr, sizeof(logStr), "Symbol group = %s, selected = %s\r\n", csg[j].name, symbol_group);
							logToFile(logStr);
							if (strcmp(csg[j].name, symbol_group) == 0) {
								cg[i].secgroups[j].show = enable;
								cg[i].secgroups[j].trade = enable;
								cg[i].secgroups[j].spread_diff = spread;
								int ret = manager->CfgUpdateGroup(&cg[i]);
								_snprintf(logStr, sizeof(logStr), "Return code = %d, group name = %s, enable = %d, group = %s\r\n", ret, symbol_group, enable, cg[i].group);
								logToFile(logStr);
								is_edit_success = TRUE;
								break;
							}
						}
						if (is_edit_success) {
							_snprintf(sendbuf, sizeof(sendbuf), "0\r\n");
						}
						else {
							_snprintf(sendbuf, sizeof(sendbuf), "1\r\n");
						}
						manager->MemFree(cg);
						manager->MemFree(csg);
					}
					else if (strcmp(opcode, "get_group_info") == 0) {
						char group_name[16];
						int total, i, offset = 0, group_match;
						GetStrParam(buffer, "GROUP=", group_name, sizeof(group_name) - 1);
						ConGroup* cg = manager->CfgRequestGroup(&total);
						ConSymbolGroup* csg = new ConSymbolGroup[MAX_SEC_GROUPS];
						manager->CfgRequestSymbolGroup(csg);
							for (i = 0; i < total; i++) {
								int j = 0;
								if (strlen(group_name) == 0 ||
									(group_match = strcmp(group_name, cg[i].group)) == 0) {
									offset += _snprintf(offset + sendbuf, sizeof(sendbuf), "group=%s\r\n", cg[i].group);
									for (j = 0; j < MAX_SEC_GROUPS; j++) {
										if (strlen(csg[j].name) == 0) {
											break;
										}
										offset += _snprintf(offset + sendbuf, sizeof(sendbuf), "%s,%d,%d\r\n", csg[j].name, cg[i].secgroups[j].spread_diff, cg[i].secgroups[j].show);
									}
									if (group_match == 0) {
										break;
									}
								}
							}
					}
					else {
						_snprintf(sendbuf, sizeof(sendbuf), "14\r\n");
					}
				}

				//send string 最後用"end\r\n"做post-fix
				tmp = sendbuf;
				_snprintf(sendbuf, sizeof(sendbuf), "%send\r\n", tmp);
				_snprintf(logStr, sizeof(logStr), "Final return = %s", sendbuf);
				logToFile(logStr);
				//傳送訊息給 client 端
				send(sConnect, sendbuf, sizeof(sendbuf), 0);
			}
		}catch(exception ex) {
			char * sendbuf = "-1\r\nend\r\n";
			send(sConnect, sendbuf, sizeof(sendbuf), 0);
		}
	}
	return(0);
}
//+------------------------------------------------------------------+
