server {
	listen 80;

	root /var/www/pimp.gamfx.dev.com;
	index index.php index.html index.htm;
	server_name pimp.gamfx.dev.com;
	access_log /var/log/pimp.gamfx.dev.com.access.log;
	error_log /var/log/pimp.gamfx.dev.com.error.log;

	location / {
		try_files $uri $uri/ =404;
		#try_files $uri $uri/ /index.php;
	}

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
