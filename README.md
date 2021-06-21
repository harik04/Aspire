This Project Requires laravel Version 6
I have used AMPPS as webserver for localhost.


/* Steps to follow */
<br>
check config/datbase.php (information regarding mysql username and password and Database)
<ul>
1) run php artisan make:seeder ImportTableSeeder to import the Sql file (database/laravel.sql)
 * note: if seeding fails, you can directly open the file and copy the contents and run it in my phpmyadmin ( it should create DB as laravel with 
  4 tables - loanapproved,loantrackers,migrations,and users.
 
2) Type in browser- http://localhost/laravel/aspire/public/
3) it will display login page- you can type in any username and password ( if not found code will insert into DB- users table)
* default username is harish and password is welcome.
</ul>
[only for Information]

Below are the list of artisan commands used for this project.
composer create-project --prefer-dist laravel/laravel blog "6.*"
[
E:\Ampps\www\laravel>composer create-project --prefer-dist laravel/laravel aspire "6.*"
]
php artisan migrate --path=/database/migrations/2021_06_20_084616_create_loantrackers_table.php
[ E:\Ampps\www\laravel\aspire>php artisan migrate --path=/database/migrations/2021_06_20_084616_create_loantrackers_table.php
]
php artisan make:model LoanTrackers

php artisan make:migration loanapproved

php artisan migrate --path=/database/migrations/2021_06_21_064817_loanapproved.php

php artisan make:model LoanApproved

php artisan make:seeder ImportTableSeeder




