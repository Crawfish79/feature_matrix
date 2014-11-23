## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
 Developers notes for this Project.. 
 
 
 
 
 
 
 
 
 Developers Notes
http://laravel.com/
https://github.com/Crawfish79/feature_matrix/blob/master/README.md
Mac Book Pro.. Apple Notes.. 
If using updated version of Mamp..
http://www.mamp.info/en/
app/config/database → database configuration file (```'port' 		=> '8889',)``` if updated Mamp
Apple users/Mamp.. You will need to point in  your terminal to the version of PHP in your MAMP application .. this is accomplished by the following.. 
 ( where 5.5.18 would be the version of php running in your mamp application)
```nano .bash_profile```
(The above will pop up a little dos like window)
```export MAMP_PHP=/Applications/MAMP/bin/php/php5.5.18/bin```
```export PATH="$MAMP_PHP:$PATH"```
Download the project from the above github repository 
Be sure to move the project folder into yout htdocs folder inside the MAMP application 
from there.. 

Be sure you have COMPOSER installed.. 
https://getcomposer.org/

 run  
 ``` composer update ```
 
This updates the  dependencies in the project
Project/app/config/database.php 
Username and password initially  set in Project/app/database/seeds/UsersTableSeeder.php

Change the database connections to match your phpMyadmin ( http://phpmyadmin.net/home_page/downloads.php) database username password and database name ( you must create the database) PHPmyadmin comes with your MAMP installation 
To  Migrate and Seed the Database.. run..
```php artisan migrate:refresh –seed ```
