#!/bin/bash
#move config
cp `pwd`/sites-available/* "/etc/nginx/sites-available/"
rm -r `pwd`/sites-available
#ib
ln -s /etc/nginx/sites-available/ib.gamfx-inside.com "/etc/nginx/sites-enabled/ib.gamfx-inside.com"
ln -s /etc/nginx/sites-available/ib.gamfx-inside.dev.com "/etc/nginx/sites-enabled/ib.gamfx-inside.dev.com"
ln -s /etc/nginx/sites-available/ib.gamfx.dev.com "/etc/nginx/sites-enabled/ib.gamfx.dev.com"
ln -s /etc/nginx/sites-available/ib.gamfx.com "/etc/nginx/sites-enabled/ib.gamfx.com"
#client
ln -s /etc/nginx/sites-available/client.gamfx-inside.com "/etc/nginx/sites-enabled/"client.gamfx-inside.com
ln -s /etc/nginx/sites-available/client.gamfx-inside.dev.com "/etc/nginx/sites-enabled/client.gamfx-inside.dev.com"
ln -s /etc/nginx/sites-available/client.gamfx.beta.com "/etc/nginx/sites-enabled/client.gamfx.beta.com"
ln -s /etc/nginx/sites-available/client.gamfx.com "/etc/nginx/sites-enabled/client.gamfx.com"
ln -s /etc/nginx/sites-available/client.gamfx.dev.com "/etc/nginx/sites-enabled/client.gamfx.dev.com"
ln -s /etc/nginx/sites-available/client.gamfx.prev.com "/etc/nginx/sites-enabled/client.gamfx.prev.com"
#admin
ln -s /etc/nginx/sites-available/admin.gamfx-inside.com "/etc/nginx/sites-enabled/admin.gamfx-inside.com"
ln -s /etc/nginx/sites-available/admin.gamfx-inside.dev.com "/etc/nginx/sites-enabled/admin.gamfx-inside.dev.com"
ln -s /etc/nginx/sites-available/admin.gamfx.beta.com "/etc/nginx/sites-enabled/admin.gamfx.beta.com"
ln -s /etc/nginx/sites-available/admin.gamfx.com "/etc/nginx/sites-enabled/admin.gamfx.com"
ln -s /etc/nginx/sites-available/admin.gamfx.dev.com "/etc/nginx/sites-enabled/admin.gamfx.dev.com"
ln -s /etc/nginx/sites-available/admin.gamfx.prev.com "/etc/nginx/sites-enabled/admin.gamfx.prev.com"
#api
ln -s /etc/nginx/sites-available/api.gamfx.dev.com "/etc/nginx/sites-enabled/api.gamfx.dev.com"
ln -s /etc/nginx/sites-available/api.gamfx.beta.com "/etc/nginx/sites-enabled/api.gamfx.beta.com"
ln -s /etc/nginx/sites-available/api.gamfx.prev.com "/etc/nginx/sites-enabled/api.gamfx.prev.com"
ln -s /etc/nginx/sites-available/api.gamfx.com "/etc/nginx/sites-enabled/api.gamfx.com"
#phpmyadmin
ln -s /etc/nginx/sites-available/phpmyadmin "/etc/nginx/sites-enabled/phpmyadmin"
#qoo
ln -s /etc/nginx/sites-available/ib.qoo.cn "/etc/nginx/sites-enabled/ib.qoo.cn"
ln -s /etc/nginx/sites-available/admin.qoo.cn "/etc/nginx/sites-enabled/admin.qoo.cn"
ln -s /etc/nginx/sites-available/client.qoo.cn "/etc/nginx/sites-enabled/client.qoo.cn"

mkdir -p /var/www/ib.gamfx.com/public_html/
mkdir -p /var/www/ib.gamfx.dev.com/public_html/
mkdir -p /var/www/ib.gamfx.beta.com/public_html/
mkdir -p /var/www/ib.gamfx.prev.com/public_html/

mkdir -p /var/www/client.gamfx.com/public_html/
mkdir -p /var/www/client.gamfx.dev.com/public_html/
mkdir -p /var/www/client.gamfx.beta.com/public_html/
mkdir -p /var/www/client.gamfx.prev.com/public_html/

mkdir -p /var/www/admin.gamfx.com/public_html/
mkdir -p /var/www/admin.gamfx.dev.com/public_html/
mkdir -p /var/www/admin.gamfx.beta.com/public_html/
mkdir -p /var/www/admin.gamfx.prev.com/public_html/

mkdir -p /var/www/api.gamfx.com/public_html/
mkdir -p /var/www/api.gamfx.dev.com/public_html/
mkdir -p /var/www/api.gamfx.beta.com/public_html/
mkdir -p /var/www/api.gamfx.prev.com/public_html/

mkdir -p /var/www/ui.gamfx.com/public_html/

mkdir -p /var/www/phpmyadmin/

#gamfx-share
mkdir -p /var/www/gamfx-share/css
mkdir -p /var/www/gamfx-share/img
mkdir -p /var/www/gamfx-share/js
mkdir -p /var/www/ib.gamfx.dev.com/public_html/share/
mkdir -p /var/www/admin.gamfx.dev.com/public_html/share/
mkdir -p /var/www/client.gamfx.dev.com/public_html/share/

chmod 777 /var/www/ib.gamfx.dev.com/public_html/share/
chmod 777 /var/www/admin.gamfx.dev.com/public_html/share/
chmod 777 /var/www/client.gamfx.dev.com/public_html/share/

ln -s /var/www/gamfx-share/css "/var/www/ib.gamfx.dev.com/public_html/share/css"
ln -s /var/www/gamfx-share/img "/var/www/ib.gamfx.dev.com/public_html/share/img"
ln -s /var/www/gamfx-share/js "/var/www/ib.gamfx.dev.com/public_html/share/js"

ln -s /var/www/gamfx-share/css "/var/www/client.gamfx.dev.com/public_html/share/css"
ln -s /var/www/gamfx-share/img "/var/www/client.gamfx.dev.com/public_html/share/img"
ln -s /var/www/gamfx-share/js "/var/www/client.gamfx.dev.com/public_html/share/js"

ln -s /var/www/gamfx-share/css "/var/www/admin.gamfx.dev.com/public_html/share/css"
ln -s /var/www/gamfx-share/img "/var/www/admin.gamfx.dev.com/public_html/share/img"
ln -s /var/www/gamfx-share/js "/var/www/admin.gamfx.dev.com/public_html/share/js"

#gamfx-tmpl
mkdir -p /var/www/gamfx-tmpl/
chmod 777 /var/www/gamfx-tmpl/

#Test
nginx -t
ble/