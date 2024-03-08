<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About This App


This app is build using below mentioned technology stack:-

Laravel - 10.10 Version
PHP - 8.2.6 Version
MySQL - 8.0.31 Version
Node - 18.15.0 Version
NPM - 9.5.0 Version

## Steps To Install And Run The Application

In order to install all the dependencies and run the application, please follow below mentioned steps:-

1. Clone Github Repo:-
git clone https://github.com/sandeshpkar/provis-app.git

2. Install Composer Dependencies:-
composer install

3. Install NPM:-
npm install && npm run dev
npm run build

4. Generate an Application Key:-
php artisan key:generate

5. Run Database Migrations:-
php artisan migrate

6. Run Database Seeders:-
php artisan db:seed

7. Serve Laravel Project:-
php artisan serve

## App Login Details

Please note that seeders will generate two dummy users as below. You can use any of the user credential to login to the application:-

1)  email: sandesh@example.com
	password: 12345678

2)  email: rohit@example.com
	password: 12345678
