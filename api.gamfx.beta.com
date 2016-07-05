server {
	listen 80;

	root /var/www/api.gamfx.beta.com/public_html;
	index index.php index.html index.htm;
	server_name api.gamfx.beta.com;
	access_log /var/www/api.gamfx.beta.com/public_html/access.log;
	error_log /var/www/api.gamfx.beta.com/public_html/error.log;

	location / {
		try_files $uri $uri/ =404;
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
	
	#error_page 404 /404.html;

	# redirect server error pages to the static page /50x.html
	#
	#error_page 500 502 503 504 /50x.html;
	#location = /50x.html {
	#	root /usr/share/nginx/html;
	#}

	# pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
	#
	#location ~ \.php$ {
	#	fastcgi_split_path_info ^(.+\.php)(/.+)$;
	#	# NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
	#
	#	# With php5-cgi alone:
	#	fastcgi_pass 127.0.0.1:9000;
	#	# With php5-fpm:
	#	fastcgi_pass unix:/var/run/php5-fpm.sock;
	#	fastcgi_index index.php;
	#	include fastcgi_params;
	#}

	# deny access to .htaccess files, if Apache's document root
	# concurs with nginx's one
	#
	#location ~ /\.ht {
	#	deny all;
	#}
}
