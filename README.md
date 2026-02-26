Smart Parking Lot System

A Smart Parking Lot Management System built using PHP and MySQL.  
The system allows automatic allocation of parking slots based on vehicle requirements such as EV charging and covered parking.



## Project Overview

This project shows a real-world smart parking management system where:

Parking slots can be added dynamically
Vehicles are allocated automatically
Nearest available slot is assigned
Slot occupancy status is tracked in real-time



## Features

Add Parking Slots
View All Parking Slots
Automatic Vehicle Allocation
Remove Vehicle from Slot
Duplicate Slot Prevention
Dynamic Filtering (EV / Covered)
Real-time Status Update
Success / Error Alert Notifications
Clean Navigation Dashboard



## Allocation Logic

The system dynamically builds SQL queries based on user requirements:

Filters only available slots (`isOccupied = 0`)
Applies EV and Covered conditions if required
Uses `ORDER BY slotNo ASC LIMIT 1` to allocate the nearest available slot

This ensures efficient and optimal parking allocation.



## Tech Stack

HTML
CSS
PHP
MySQL
Git & GitHub



## How to Run Locally

Install XAMPP
Start Apache & MySQL
Create database smart_parking
Import table structure
Place project inside "htdocs"
Open:localhost/smart-parking




## Deployment

The project is deployed on InfinityFree



## Author

Nishita Agrawal
PHP Developer | B.Tech AIML  
Passionate about building real-world problem-solving web applications.

