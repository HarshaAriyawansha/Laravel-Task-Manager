Laravel Task Manager

This project is a task management application built with the Laravel framework. It provides users with a simple and efficient way to create, manage, and track their tasks.

Features

    User Authentication: Secure user registration, login, and logout.

Task Management:

    Create new tasks with a title and description.

    View a list of all tasks.

    Edit existing tasks.

    Delete tasks.

    Update task status (e.g., pending, completed).

Database: A relational database (MySQL) to store user and task information.

Technologies Used

    Backend: PHP, Laravel 11 Framework

    Database: MySQL

    Frontend: HTML, CSS, JavaScript

    Styling (assumed): Tailwind CSS or Bootstrap

Getting Started

    To get a copy of the project up and running on your local machine, follow these steps.

Prerequisites
    
    PHP >= 8.1

    Composer

    MySQL

Installation
    
    1.Clone the repository:

        Bash

            git clone https://github.com/HarshaAriyawansha/Laravel-Task-Manager.git
    
    2.Navigate to the project directory:

        Bash

            cd Laravel-Task-Manager
        
    3.Install PHP dependencies:

        Bash

            composer install

    4.Copy the environment file:

        Bash

            cp .env.example .env
        
    5.Configure your .env file:

     Open the .env file and update your database credentials.

            DB_DATABASE=your_db_name
            DB_USERNAME=your_db_username
            DB_PASSWORD=your_db_password

    6.Generate the application key:

        Bash

            php artisan key:generate

    7.Run database migrations:

        Bash

            php artisan migrate

Usage

After completing the installation steps, you can run the application on your local server.

    1.Start the local development server:

    Bash

        php artisan serve

    2.Access the application:
    
        Open your web browser and visit http://127.0.0.1:8000.

Contribution

    Contributions are welcome! If you find a bug or have a suggestion for a new feature, please open an issue or submit a pull request.
