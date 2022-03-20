# CryptoTax Repository

## GIT process

The `develop` branch is automatically deployed to the test server.


## Stuff to install

```shell
sudo apt install php8.0-soap php8.0-intl
```

## Update your local installation

On each pull, run the following commands:

```bash
git pull
composer install
php artisan migrate
php artisan optimize:clear
npm install
npm run watch
```

## Queues

Queues are run (on Prod) with supervisor. For this see https://laravel.com/docs/8.x/queues

Config:

```conf
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/cryptotax/artisan queue:work sqs --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=dev
numprocs=8
redirect_stderr=true
stdout_logfile=/var/www/cryptotax/storage/logs/worker.log
stopwaitsecs=10000
```

## Nginx config

```
server {
    server_name mycrypto.tax www.mycrypto.tax;
    root /var/www/cryptotax/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        auth_basic "Dev-Zone";
        auth_basic_user_file /etc/apache2/.htpasswd;
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Disable password protection for spark webhooks
    location ^~ /spark/ {
        auth_basic off;
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    include snippets/certbot.conf;

    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/mycrypto.tax/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/mycrypto.tax/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
}

server {
    if ($host = www.mycrypto.tax) {
        return 301 https://$host$request_uri;
    } # managed by Certbot#


    if ($host = mycrypto.tax) {
        return 301 https://$host$request_uri;
    } # managed by Certbot

    listen 80;
    server_name mycrypto.tax www.mycrypto.tax;
    return 404; # managed by Certbot
}
```
