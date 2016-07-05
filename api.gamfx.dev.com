server {
	listen 80;

	root /var/www/api.gamfx.dev.com/public_html;
	index index.php index.html index.htm;
	server_name api.gamfx.dev.com;
	access_log /var/www/api.gamfx.dev.com/public_html/access.log;
	error_log /var/www/api.gamfx.dev.com/public_html/error.log;

        if ($request_uri ~* ^/system/|^/application/)
        {
                rewrite ^/(.*)$ /index.php?/$1 last;
                break;
        }
	
	location /postman/show {
		return 302 http://api.gamfx.dev.com/test/postman_api/show;
	}
	location ~^/postman/add/(.*)/(.*)$ {
		return 302 http://api.gamfx.dev.com/test/postman_api/add/$1/$2;
	}
	location ~^/postman/(.*)$ {
                return 302 http://api.gamfx.dev.com/test/postman_api/index/$1;
	}
	location / {
		try_files $uri $uri/ /index.php;
	}

	# Only for nginx-naxsi used with nginx-naxsi-ui : process denied requests
	#location /RequestDenied {
	#	proxy_pass http://127.0.0.1:8080;    
	#}

	error_page 404 /404.html;
    	error_page 500 502 503 504 /50x.html;
    	location = /50x.html {
        	root /usr/share/nginx/html;
    	}

    	location ~ \.php$ {
       		try_files $uri $uri/ /index.php;
        	fastcgi_split_path_info ^(.+\.php)(/.+)$;
	        fastcgi_pass 127.0.0.1:9000;
        	fastcgi_index index.php;
	        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        	include fastcgi_params;
    	}
}
