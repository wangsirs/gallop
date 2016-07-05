server {
	listen 80;

	root /var/www/ui.gamfx.com/public_html;
	index index.php index.html index.htm;
	server_name ui.gamfx.com;
	access_log /var/www/ui.gamfx.com/public_html/access.log;
	error_log /var/www/ui.gamfx.com/public_html/error.log;

	location / {
		try_files $uri $uri/ =404;
		#try_files $uri $uri/ /index.html;
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

}
