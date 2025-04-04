# DevJourney - A Simple Blogging Platform

## Overview
**DevJourney** is a beginner-friendly blogging platform built with Laravel. It allows users to register, interact with blog posts, and request an author role to publish their own articles.

## Features
- **User Authentication**: Users can register, log in, and manage their profiles.
- **Role-Based Authorization**:
  - Users can browse and interact with posts.
  - Authors can create, edit, and delete their own posts.
- **Post Management**: Authors can write and publish blog posts.
- **Like & Comment System**: Users can like and comment on posts.
- **Email System**: Users can request a role upgrade via email to become an author.

## Technology Used
- **Backend**: Laravel
- **Frontend**: HTML, CSS, Bootstrap
- **Database**: MySQL
- **Email Service**: Laravel Mail

## Installation

### Prerequisites
 Before setting up the application, ensure that the following software is installed on your system:
    - PHP = 8.3
    - Composer
    - MySQL

 ### Steps
   - **Clone the repository**: git clone https://github.com/devjourney/primepicks 
   - **Navigate to the project folder**: cd devjourney
   - **Install Dependencies using composer**: composer install
   - **Set up Evironment file**:  cp .env.example .env
   - **Generate the application key**: php artisan key:generate
   - **Set up your database credentials in the .env file**
   - **Run Migrations: php artisan migrate**
   - **Serve the application: php artisan serve**

**Visit http://localhost:8000 in your browser to view the application.**


## Contributing
 - **Feel free to fork this repository and submit pull requests. Make sure to follow the coding style used in the project.**#
