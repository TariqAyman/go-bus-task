## Go-Bus TASK

Please find the attached task to complete our technical interview

- A travel company wants to make a system for users to book their trips from city to city. Users can book their pickup area from the source city and the area they want to reach in the destination city. Every trip can be different, for example, a certain trip can pass by 2 areas while another trip will pass by 2 other different areas. The user can choose his payment method either by cash or credit and he has the ability to choose the seat number on the bus if it's not occupied.


- Your task is to implement using the given database an API to reserve a seat on a specific trip and write validations (No one can reserve on a canceled trip etc..). The user will enter his name and phone number along with the selected trip, seat, areas, and payment method. After a successful reservation, the user needs to see the information of the trip reserved such as the city names, area names and trip start time, or any other additional information.


- The deadline for this task is 1-hour using Laravel

------------------------------

## Requirments:

- PHP 8.1 or later.
- MySQL 5.7 or later.

## installation Steps

- Step 1: git clone url project.
- Step 2: `composer install` for download the required packages.
- Step 3: create database with name "algoriza_task"
- Step 4: `cp .env.example .env` to copy env file.
- Step 5: `php artisan key:generate` to generate new app key.
- Step 6: `php artisan migrate` to run database migration.
- Step 7: `php artisan db:seed` to run database seeder for create default user.
- Step 8: `npm install && npm run build` for compiling your fresh scaffolding.
- Step 9: `php artisan serve` to deploy the module

### NOTE

if you get any errors in this steps, when seeding the database, related to existing data, please run the following:

- run `php artisan config:cache` to reset setting to is last good case.
- run `chmod -R 777 storage` to give permissions to storage folder for read/wire actions.
- run `chown www-data -R storage` for the same reason described above.
