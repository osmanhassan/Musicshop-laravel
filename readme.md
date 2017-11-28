

## About

This project is for online musical instrument shop.This system has two types of users(Customer and Admin). 

  A customer can visit the musicshop by the url /musicshop . The customer can seach for an item catagorywise or by name. A product can be adder to the cart by pressing the 'ADD TO CART' button. After adding products customer can place order by pressing the place order button.Customer has to fill up the form to order. After a successful customer will receve a message containing the billing information.
  
  An admin will receieve notification for every order.Admin can get the order information by clicking on the notification of that order or he can go to the order page by clicking on orders in the menu. After receiving the bill from the customer admin can deliver the order from the order information. He also has the control in the menu for adding new product and admin. a product can be edited or deleted by the admin from the products page. He can add image of a product by clicking on the camera icon in the description of that product.Admin can have the information about the sell of a particular date , list of top sold products on a date and future sell pediction from the sells control on the menu.

## Developded Using

Laravel(5.4), jquery(3.2.1), HTML 5, CSS3 and MySQL database

## Installation
 <p>Step 1:</p>
 
If composer is not installed in your machine, download and install composer. 

<p>Step 2:</p>

Download the zip or clone the project in a directory of your machine. 

<p>Step 3:</p>

Extarct the zip on that directory if you download the zip file.

<p>Step 4:</p>

Open the command line on that directory and run the command: composer install. It will install all the dependencies of this project in your machine. It may take few minutes depending on your internet speed. 

<p>Step 5:</p>

Run mysql server and go to phpmyadmin. Create a new database named laravel and set the collation utf8_unicode_ci.

<p>Step 6:</p>

In the command line run the command: php artisan migrate

<p>Step 7:</p>

In the command line run the command: php artisan serve --port your free port number

<p>Step 8:</p>
Run mysql server and go to your browser. For customer side write in the url: localhost:port you assigned previously/musicshop. For Admin side write in the url: localhost:port you assigned previously/login. Intial username is:osman and password is:Aa*111 . You can change it later by adding a new admin from the menu.

## Author

Hassan md. Osman.
Email:hassanmdosman@gmail.com

## Issues

You are welcome to inform in the issue section or via email.


