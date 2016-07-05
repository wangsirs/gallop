server {
	listen 80;

	root /var/www/admin.gamfx.dev.com/public_html;
	index index.php index.html index.htm;
	server_name admin.gamfx-inside.com;
	access_log /var/www/admin.gamfx.dev.com/public_html/access.log;
	error_log /var/www/admin.gamfx.dev.com/public_html/error.log;

	if ($request_uri ~* ^/system/|^/application/)
    	{
        	rewrite ^/(.*)$ /index.php?/$1 last;
        	break;
    	}

	location / {
		#try_files $uri $uri/ =404;
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
