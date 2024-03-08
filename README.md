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

3. Copy the Environment File:-

	Laravel projects typically have a .env.example file that contains configuration settings. Create a copy of this file and rename it to .env using below command:

	cp .env.example .env

4. Generate an Application Key:-

	php artisan key:generate

5. Configure the Database:-

	Open the .env file in a text editor and configure your database settings. You will need to set values as below:

	DB_CONNECTION=mysql

	DB_HOST=127.0.0.1

	DB_PORT=3306

	DB_DATABASE=provisapp

	DB_USERNAME=root

	DB_PASSWORD=


6. Install NPM:-

	npm install && npm run dev

	npm run build

7. Run Database Migrations:-

	php artisan migrate

8. Run Database Seeders:-

	php artisan db:seed

9. Serve Laravel Project:-

	php artisan serve

	This command starts a local development server, and you can access your project in your web browser by visiting the URL provided (usually http://127.0.0.1:8000/).



## App Login Details

Please note that seeders will generate two dummy users as below. You can use any of the user credential to login to the application:-

1)  email: sandesh@example.com

	password: 12345678

2)  email: rohit@example.com

	password: 12345678
