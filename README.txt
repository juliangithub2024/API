# Laravel 9.2 API - Installation Instructions

##Prerequisites
Make sure you have installed on your system:
- PHP 8.0 or higher
- Composer
- Laravel installed globally
- MariaDB configured and running

---

## Steps to install and configure the API

1. **Clone the project or copy the files**
Copy all the project files to the desired directory on your system.

git clone <REPOSITORY_URL> project-name

	2. Enter the project directory:
		CD <petri_si>

	3.Configure project dependencies

	Install Laravel dependencies using Composer:

	composer install


	4. Edit the .env file to configure the connection to your MariaDB database. Change the following variables according to your configuration:

		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=<petri_nets>
		DB_USERNAME=<YOUR_USERNAME>
		DB_PASSWORD=<YOUR_PASSWORD>

	5.Generate the application key

	Run the following command to generate the unique key for the Laravel application:
		php artisan key:generate

	6. + Migrate the database
	Open the mariaDB console and run the following command
	sudo mysql -u root;

	7. Create the database
	create database petri_net;

	8. Return to the terminal in the project folder and run the migrations to create the necessary tables in the database:
	php artisan migration

	9. Start the Laravel development server:
	php artisan serve --host 0.0.0.0

	10. Access the API in your browser or HTTP client using the default URL:
	http://0.0.0.0:8000
