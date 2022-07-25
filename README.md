# Sprint9 - Travel Agency Backend part with Laravel

## About the project

-   This is final project i made while studying at Baltic Institute of Technology.
-   It's an application created with PHP **Laravel** framework as Backend part and JavaScript **React** library as Frontend part.
-   For database is used **MySQL Workbench**.
-   Main styling was made with **Bootstrap** framework and a bit of raw **CSS**.

## Features

-   This Travel Agency app is connected with MySQL Workbench. All the changes made in the application change data in the database too, and the other way around. I used 1:M relation to link Countries - Hotels and Hotels - Customers. It means one Country can have many hotels and one hotel can have many customers.
-   Application has login and register forms. For authentication i used JWT. Once you are logged in, you can see all the data and make changes like:
    -   Add new country, hotel or custumer. Assign country to a hotel or hotel to a customer.
    -   Update countries, hotels and customers;
    -   Delete countries (only if there are no hotels assigned), hotels (only if there are no customers assigned), customers;
-   If you are not logged in you can only:
    -   See hotels and its information ordered by price;
    -   Search for a hotel by its name;

## Launch procedure

To run this project you will need XAMPP and MySQL Workbench. Install if you still dont have them and follow the steps below:

1. Navigate to the folder where you want to have this project saved. Open your terminal and type `git clone https://github.com/IevaBa/Sprint9-TravelAgency-backend.git`;
2. Run XAMPP and start Apache and MySQL Servers;
3. Run `composer update` in your terminal if you already have it or install composer globally and run `composer install`;
4. Open MySQL Workbench and create database **sprint9** with the following line `CREATE DATABASE sprint9;`
5. Then in your cloned laravel project find `.env.example` file, copy and change it to `.env`;
6. Open `.env` file, find database line and change it to your freshly created database `DB_DATABASE=sprint9`;
7. For next step you have to generate app key by running this command: `php artisan key:generate`;
8. This app has implemented JWT auth, so you have to generate secret key for token encryption. to do that run this command line `php artisan jwt:secret`;
9. Now run migrations and seeders by typing `php artisan migrate` and `php artisan db:seed` and `php artisan storage:link` (for images upload);
10. Finally run `php artisan serve`, your API is ready !!
11. To run project in React follow the launch procedure here: https://github.com/IevaBa/Sprint9-TravelAgency-frontend .

## Author

This project was created by me - Ieva Baltriukaite.

Find me on [LinkedIn](https://www.linkedin.com/in/ieva-baltriukaite-59038755/)
