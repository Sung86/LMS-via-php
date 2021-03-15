# Library Management System
===========================
To build a Library Management System using MVC framework

## Main Features
=================
* Login - only registered users can login
* Register - any non-existing user can register
* Search - only logged in users are able to search books

## Databases & Tables
====================
###DB1 | DB2  | DB3
  User | User | User
  Book | Book | Book

## Records Created In Databases
===============================
User accounts have been created during software testings.

#######################
UserID: 1
name: admin
username: admin
age: 27
address: Hobart
password: #Admin123
email: admin@gmail.com

#######################
UserID: 2
name: bob
username: bob
age: 21
address: Launceston
password: #Bob123
email: bob@gmail.com

#######################

**Note:** 
* User: The records of the tables User in each database are the same; however, 
the attributes of those tables are at least differ in an extra attribute.

* Book: Each table holds 20 records and all records are unique across the tables in each database:
    * DB1.Book holds the books published in years between 1950 - 1970
    * DB2.Book holds the books published in years between 1970 - 1990
    * DB3.Book holds the books published in years between 1990 - 2019


## Built With
==============
* HTML
* CSS
* Javascript (using library: Jquery)
* PHP
* MYSQL 

## Version
=============
23 August 2019

## Author
===========
Sung
