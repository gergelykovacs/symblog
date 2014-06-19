SymBlog
=======

Continued [Symfony](http://symfony.com/ "Symfony") 2.5 Tutorial completion based on the [blog](http://tutorial.symblog.co.uk/ "Symfony2 Tutorial").

#### Install

To install the project you need to have the PHP dependency manager called [Composer](https://getcomposer.org/ "Composer").

```Bash
$> mkdir /var/www/lh.symblog && cd /var/www/lh.symblog
$> git clone https://github.com/gergelykovacs/symblog.git .

.... [ clones the repo into lh.symblog ]

$> composer install

... [ installs all the dependencies and requirements while at the end please fill these ]

Creating the "app/config/parameters.yml" file
Some parameters are missing. Please provide them.
database_driver (pdo_mysql): 
database_host (127.0.0.1): 
database_port (null): 
database_name (symfony): symblog
database_user (root): symblog
database_password (null): passwd123
mailer_transport (smtp): 
mailer_host (127.0.0.1): 
mailer_user (null): 
mailer_password (null): 
locale (en): 
secret (ThisTokenIsNotSoSecretChangeIt): 
debug_toolbar (true): 
debug_redirects (false): 
use_assetic_controller (true):
```
Eventually, you should set up the local web service as follows and you are done.

#### Host configuration

Here and now please note that *.lh* refers to your localhost so the `/etc/hosts` file should contain the following line.

```Bash
127.0.0.1    prod.symblog.lh    test.symblog.lh    dev.symblog.lh
```

#### Nginx configuration

You can access the project's different states by the URIs

- **Production** http://prod.symblog.lh
- **Testing** http://test.symblog.lh
- **Development** http://dev.symblog.lh

and it is for convenience only *(NOT FOR PRODUCTION SERVICE)*.

*Please be aware of [Nginx IfEvil](http://wiki.nginx.org/IfIsEvil "Nginx IfIsEvil") when you read the configuration below.*

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
