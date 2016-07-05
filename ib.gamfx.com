server {
	listen 80;
        server_name ib.gamfx.com;
        access_log /var/www/ib.gamfx.dev.com/public_html/access_front_o.log;
        error_log /var/www/ib.gamfx.dev.com/public_html/error_front_o.log;

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
		proxy_pass http://ib.gamfx-inside.com/A00001/;
	}

}
