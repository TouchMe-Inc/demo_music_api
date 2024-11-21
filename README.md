# About
This application is a demo version of the music site API.

## Deploy

1. `git clone https://github.com/TouchMe-Inc/demo_music_api.git`;
2. `cd demo_music_api`;
3. `docker compose up -d --build`;
4. `docker compose exec phpmyadmin chmod 777 /sessions`;
5. `docker compose exec php bash`;
6. `chown -R www-data:www-data /var/www/src/storage /var/www/src/bootstrap/cache`;
7. `chmod -R 775 /var/www/src/storage /var/www/src/bootstrap/cache`;
8. `cd src && composer setup && cd ../`.
9. (optional) `cd src && php artisan db:seed && cd ../`.

For subsequent launches `docker compose up -d`.

## Swagger as docs
Open `/api/documentation` to see a list of all API capabilities

## Notes
phpMyAdmin:
- Server: db
- Database: `secretdb`
- Username: `secretusr`
- Password: `secretpwd`
