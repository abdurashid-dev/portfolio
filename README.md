## Adminlte starter kit

•	Author: [Abdurashid](https://github.com/Abdurashid-dev) <br>
•	Telegram: [@abdurashid_coder](https://t.me/abdurashid_coder) <br>
•	Instagram: [@abdurashid___17](https://www.instagram.com/abdurashid___17/) <br>

## Usage <br>
Setup your coding environment <br>
```
git clone https://github.com/Abdurashid-dev/adminlte.git
cd adminlte
composer install
npm install
npm run build
cp .env.example .env 
php artisan key:generate
php artisan migrate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```

## Database Setup <br>
We will be performing database tests which (obviously) needs to interact with the database. Make sure that your database credentials are up and running.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adminlte
DB_USERNAME=root
DB_PASSWORD=
```

Next up, we need to create the database which will be grabbed from the ```DB_DATABASE``` environment variable.
```
mysql;
create database adminlte;
exit;
