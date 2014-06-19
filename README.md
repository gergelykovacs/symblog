symblog
=======

Symfony 2.5 Tutorial


#### Host configuration

```Bash
127.0.0.1    prod.symblog.lh    test.symblog.lh    dev.symblog.lh
```

#### Nginx configuration

```Nginx
server {
    listen 80;
    server_name ~^(?<symenv>prod|test|dev).symblog.lh$;
	root /var/www/lh.symblog/web;

        access_log  /var/log/nginx/lh.symblog/access-80.log main;
        error_log  /var/log/nginx/lh.symblog/error-80.log warn;

	set $web_script "app_$symenv.php";

	if ($symenv ~ "^prod$") {
		set $web_script "app.php";
	}

	location / {
		index $web_script;
		try_files $uri /$web_script/$args;
	}

	location ~ ^/(app|app_dev|app_test|config)\.php(/|$) {
		fastcgi_pass 127.0.0.1:9000;
		fastcgi_split_path_info ^(.+\.php)(/.*)$;
		include fastcgi_params;
		fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
	}

        location ~ /\.ht {
		deny all;
        }

        location = /favicon.ico {
                access_log off;
                log_not_found off;
        }
}
```
