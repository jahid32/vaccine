<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Assignment 13: Vaccine registration system

This week, you will develop a partial implementation of a 'Vaccine registration system'. 

## Features
Registration page for users with:
NID, email, phone number, name
Select vaccine center 
Vaccine centers can be added only by Seeders. No need to implement a CRUD for it. 
Every vaccine center will have a 'daily limit'. 

## Schedule vaccination date:
Daily at 9 PM
Select users who registered first (consider vaccine center limit)
Send Email notification (Async job)
Skip weekends (Sunday-Thursday)
User's will have the following status:
Not scheduled
Scheduled
Vaccinated (When the scheduled time is over, the user will be considered vaccinated)
##  Bonus task:
Create an admin panel and Show Users List with filter based on status and vaccine center (using FilamentPHP)