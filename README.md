
## Installation

Make sure ports: 3306,8000,8080, 6379 are open.

```shell
docker-compose up -d
cd bin/webserver && docker build . && cd .. && cd ..
cd www && npm install
composer install
env DB_HOST=127.0.0.1 php artisan migrate
env DB_HOST=127.0.0.1 php artisan db:seed
```

Your LAMP stack is now ready!! You can access it via 
```shell
Main:
http://localhost
Phpmyadmin:
http://localhost:8080
username: docker
password: docker

```
