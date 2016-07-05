#-*- coding: utf-8 -*-
#!/usr/bin/python
#Author: Martin 

import socket , time, traceback, os, sys
from threading import Thread

host = '127.0.0.1'
port = 5566
bufSize = 4096
logFile = '/var/log/mt4.log'

def log(strContent):
	global logFile
	timeStr = time.strftime('[20%y-%m-%d %H:%M:%S]')
	os.system("echo '[%s] => %s' >> %s" %(timeStr, str(strContent), logFile))

def main():
	global host, port, bufSize
	apInst = ApMonitor()
	Thread(target = apInst.polling, args = (host, port, bufSize)).start()
	Thread(target = apInst.monitorProc, args = ()).start()

class ApMonitor():
	def __init__(self):
		pass

	def polling(self, HOST, PORT, BUFFER):
		while True:
			try:
				sock=socket.socket(socket.AF_INET,socket.SOCK_STREAM)  
				sock.connect((HOST,PORT))  
				sock.send('OP=ping_remote')  
				recv=sock.recv(BUFFER)  
				sock.close() 
				log('Start to sleep')
			except:
				continue
			finally:
				time.sleep(20)

	def monitorProc(self):
		global logFile
		while True:
			try:
				if abs(os.path.getmtime(logFile) - time.time()) > 30:
					log('Mt4 service will be restart ...')
					os.system('service mt4 restart')
			except:
				pass
			finally:
				time.sleep(10)

if __name__ == '__main__':
	main()