server {
	listen 80;
        server_name ib.gamfx.dev.com;
        access_log /var/log/ib.gamfx.dev.com.access.log;
        error_log /var/log/ib.gamfx.dev.com.error.log;

	location ~ \.(gif|jpg|png|js|css|woff2|woff|ico|eot)$ {
	    root /var/www/ib.gamfx.dev.com/public_html/;
                gzip on;
                gzip_min_length 1k;
                gzip_buffers 4 16k;
                #gzip_http_version 1.0;
                gzip_comp_level 2;
                #do not gzip image or font
                gzip_types text/plain application/x-javascript text/css application/xml text/javascript;
                gzip_vary off;
                gzip_disable "MSIE [1-6]\.";
	}

        location / {
		proxy_pass http://ib.gamfx-inside.dev.com/A00001/;
	}

}
