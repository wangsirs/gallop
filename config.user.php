<?php
/*! pimpmylog - 1.7.10 - 65d6f147e509133fc5f09642ba82b149ef750ef2*/
/*
 * pimpmylog
 * http://pimpmylog.com
 *
 * Copyright (c) 2015 Potsky, contributors
 * Licensed under the GPLv3 license.
 */
?>
<?php if(realpath(__FILE__)===realpath($_SERVER["SCRIPT_FILENAME"])){header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');die();}?>
{
	"globals": {
		"_remove_me_to_set_AUTH_LOG_FILE_COUNT"         : 100,
		"_remove_me_to_set_AUTO_UPGRADE"                : false,
		"_remove_me_to_set_CHECK_UPGRADE"               : true,
		"_remove_me_to_set_EXPORT"                      : true,
		"_remove_me_to_set_FILE_SELECTOR"               : "bs",
		"_remove_me_to_set_FOOTER"                      : "&copy; <a href=\"http:\/\/www.potsky.com\" target=\"doc\">Potsky<\/a> 2007-' . YEAR . ' - <a href=\"http:\/\/pimpmylog.com\" target=\"doc\">Pimp my Log<\/a>",
		"_remove_me_to_set_FORGOTTEN_YOUR_PASSWORD_URL" : "http:\/\/support.pimpmylog.com\/kb\/misc\/forgotten-your-password",
		"_remove_me_to_set_GEOIP_URL"                   : "http:\/\/www.geoiptool.com\/en\/?IP=%p",
		"_remove_me_to_set_GOOGLE_ANALYTICS"            : "UA-XXXXX-X",
		"_remove_me_to_set_HELP_URL"                    : "http:\/\/pimpmylog.com",
		"_remove_me_to_set_LOCALE"                      : "gb_GB",
		"_remove_me_to_set_LOGS_MAX"                    : 50,
		"_remove_me_to_set_LOGS_REFRESH"                : 0,
		"_remove_me_to_set_MAX_SEARCH_LOG_TIME"         : 5,
		"_remove_me_to_set_NAV_TITLE"                   : "",
		"_remove_me_to_set_NOTIFICATION"                : true,
		"_remove_me_to_set_NOTIFICATION_TITLE"          : "New logs [%f]",
		"_remove_me_to_set_PIMPMYLOG_ISSUE_LINK"        : "https:\/\/github.com\/potsky\/PimpMyLog\/issues\/",
		"_remove_me_to_set_PIMPMYLOG_VERSION_URL"       : "http:\/\/demo.pimpmylog.com\/version.js",
		"_remove_me_to_set_PULL_TO_REFRESH"             : true,
		"_remove_me_to_set_SORT_LOG_FILES"              : "default",
		"_remove_me_to_set_TAG_DISPLAY_LOG_FILES_COUNT" : true,
		"_remove_me_to_set_TAG_NOT_TAGGED_FILES_ON_TOP" : true,
		"_remove_me_to_set_TAG_SORT_TAG"                : "default | display-asc | display-insensitive | display-desc | display-insensitive-desc",
		"_remove_me_to_set_TITLE"                       : "Pimp my Log",
		"_remove_me_to_set_TITLE_FILE"                  : "Pimp my Log [%f]",
		"_remove_me_to_set_UPGRADE_MANUALLY_URL"        : "http:\/\/pimpmylog.com\/getting-started\/#update",
		"_remove_me_to_set_USER_CONFIGURATION_DIR"      : "config.user.d",
		"_remove_me_to_set_USER_TIME_ZONE"              : "Europe\/Paris"
	},

	"badges": {
		"severity": {
			"debug"       : "success",
			"info"        : "success",
			"notice"      : "default",
			"Notice"      : "info",
			"warn"        : "warning",
			"error"       : "danger",
			"crit"        : "danger",
			"alert"       : "danger",
			"emerg"       : "danger",
			"Notice"      : "info",
			"fatal error" : "danger",
			"parse error" : "danger",
			"Warning"     : "warning"
		},
		"http": {
			"1" : "info",
			"2" : "success",
			"3" : "default",
			"4" : "warning",
			"5" : "danger"
		}
	},

	"files": {
		"nginx1": {
			"display" : "NGINX Error #1",
			"path"    : "\/var\/log\/nginx\/error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
					"Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
					"Severity" : 7,
					"Error"    : [10,18],
					"Client"   : 11,
					"Server"   : 12,
					"Method"   : 13,
					"Request"  : 14,
					"Host"     : 15,
					"Referer"  : 17
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s \/100",
					"Severity" : "badge:severity",
					"Error"    : "pre",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx2": {
			"display" : "NGINX Access #2",
			"path"    : "\/var\/log\/nginx\/access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA Extended",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
		"syslog1": {
			"display" : "[DEV-SYS]",
			"path"    : "\/var\/log\/gallop_dev.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
                "regex"        : "@^(.*?) ([0-9]{1,2}) ([0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}) (ip-[0-9]{1,3}-[0-9]{1,3}-[0-9]{1,3}-[0-9]{1,3}) \\[(.*)\\]\\[(.*)\\]\\[[0-9]{1,10}]: (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
                    "Date": [1," ",2," ",3],
                    "Class": 5,
					"Severity" : 6,
					"Message"  : 9,
					"Client"   : 10,
					"Server"   : 11,
					"Method"   : 12,
					"Request"  : 13,
					"Host"     : 14,
					"Referer"  : 15
				},
				"types"    : {
                    "Date": "date:m-d H:i:s",
                    "Class": "txt",
					"Severity" : "badge:severity",
					"Message"  : "txt",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx3": {
			"display" : "[DEV-API] .dev.com.error",
			"path"    : "\/var\/log\/api.gamfx.dev.com.error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
					"Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
					"Severity" : 7,
					"Error"    : [10,18],
					"Client"   : 11,
					"Server"   : 12,
					"Method"   : 13,
					"Request"  : 14,
					"Host"     : 15,
					"Referer"  : 17
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s \/100",
					"Severity" : "badge:severity",
					"Error"    : "pre",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx4": {
			"display" : "[DEV-API] .dev.com.access",
			"path"    : "\/var\/log\/api.gamfx.dev.com.access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA Extended",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
		"nginx5": {
			"display" : "[DEV-CLIENT] -inside.dev.com.error",
			"path"    : "\/var\/log\/client.gamfx-inside.dev.com.error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
					"Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
					"Severity" : 7,
					"Error"    : [10,18],
					"Client"   : 11,
					"Server"   : 12,
					"Method"   : 13,
					"Request"  : 14,
					"Host"     : 15,
					"Referer"  : 17
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s \/100",
					"Severity" : "badge:severity",
					"Error"    : "pre",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx6": {
			"display" : "[DEV-CLIENT] -inside.dev.com.access",
			"path"    : "\/var\/log\/client.gamfx-inside.dev.com.access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA Extended",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
		"nginx7": {
			"display" : "[DEV-IB] -inside.dev.com.error",
			"path"    : "\/var\/log\/ib.gamfx-inside.dev.com.error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
					"Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
					"Severity" : 7,
					"Error"    : [10,18],
					"Client"   : 11,
					"Server"   : 12,
					"Method"   : 13,
					"Request"  : 14,
					"Host"     : 15,
					"Referer"  : 17
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s \/100",
					"Severity" : "badge:severity",
					"Error"    : "pre",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx8": {
			"display" : "[DEV-IB] -inside.dev.com.access",
			"path"    : "\/var\/log\/ib.gamfx-inside.dev.com.access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA Extended",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
		"nginx9": {
			"display" : "[ONLINE-CLIENT] -inside.com.error",
			"path"    : "\/var\/log\/client.gamfx-inside.com.error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
					"Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
					"Severity" : 7,
					"Error"    : [10,18],
					"Client"   : 11,
					"Server"   : 12,
					"Method"   : 13,
					"Request"  : 14,
					"Host"     : 15,
					"Referer"  : 17
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s \/100",
					"Severity" : "badge:severity",
					"Error"    : "pre",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx10": {
			"display" : "[ONLINE-CLIENT] -inside.com.access",
			"path"    : "\/var\/log\/client.gamfx-inside.com.access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA Extended",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
		"nginx11": {
			"display" : "[ONLINE-IB] -inside.com.error",
			"path"    : "\/var\/log\/ib.gamfx-inside.com.error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
				"export_title" : "Error",
				"match"        : {
					"Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
					"Severity" : 7,
					"Error"    : [10,18],
					"Client"   : 11,
					"Server"   : 12,
					"Method"   : 13,
					"Request"  : 14,
					"Host"     : 15,
					"Referer"  : 17
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s \/100",
					"Severity" : "badge:severity",
					"Error"    : "pre",
					"Client"   : "ip:http",
					"Server"   : "txt",
					"Method"   : "txt",
					"Request"  : "txt",
					"Host"     : "ip:http",
					"Referer"  : "link"
				}
			}
		},
		"nginx12": {
			"display" : "[ONLINE-IB] -inside.com.access",
			"path"    : "\/var\/log\/ib.gamfx-inside.com.access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA Extended",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
		"nginx13": {
			"display" : "mt4",
			"path"    : "\/var\/log\/mt4.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "NGINX",
				"regex"        : "@^(.*)$@U",
				"export_title" : "Error",
				"match"        : {
					"Message"  : 1
				},
				"types"    : {
					"Message"  : "txt"
				}
			}
		},
		"nginx14": {
			"display" : "fail2bin",
			"path"    : "\/var\/log\/fail2ban.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"    : {
				"type"         : "F2BAN",
				"regex"        : "@^(.*)-(.*)-(.*) (.*):(.*):(.*),(.*) fail2ban.(.*): (.*) (.*)$@U",
				"export_title" : "Error",
				"match"        : {
                    "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6,".",7],
                    "class"    : 8,
					"Severity" : 9,
                    "message"  : 10                    
				},
				"types"    : {
					"Date"     : "date:Y\/m\/d H:i:s.B \/100",
                    "class"    : "txt",
					"Severity" : "badge:severity",
                    "message"  : "txt"
				}
			}
		}
	}
}