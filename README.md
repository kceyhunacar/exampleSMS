Project Name RESTful API
This project contains a RESTful API developed using Laravel. The API is documented with Swagger and integrated with an admin panel for ease of use.

Getting Started
To run the project locally, you can follow the steps below.

Install Dependencies

Install project dependencies by running the following command in the terminal:

```
composer install
```
Set Environment Variables

Create the .env file and set the necessary environment variables, including important information such as database connection details.

Database Migrations and Seeding

Create the database and populate it with sample data by running the following commands sequentially:
 ```
php artisan migrate
php artisan db:seed
php artisan jwt:secret
  ```
Start the Server

Start the project with Laravel's built-in server using the following command:

```
php artisan serve
```
 

Using Swagger

Access Swagger documentation by visiting http://localhost:8000/api/documentation in your browser. API endpoints and usage information are displayed here.

Admin Panel

To use the admin panel within the project, go to http://localhost:8000/admin/login in your browser and log in.
```
Admin User E-mail: admin@admin.com
Admin User Password: 123123
```
SMS Sending Test

This project uses Laravel notification system for SMS sending. You can follow these steps to test the SMS sending process:


Add lines to your .env file
 ```
DB_CONNECTION_SECOND=test
DB_HOST_SECOND=mysql
DB_PORT_SECOND=3306
DB_DATABASE_SECOND=sms
DB_USERNAME_SECOND=root
DB_PASSWORD_SECOND=
```
Use this command for testing
```
php artisan test
```
 
