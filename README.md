### How to setup Local Development? ###
1. Clone Repository
2. Open project folder in VScode or Editor of your choice
3. In terminal run "composer update" to download all necessary packages and libraries
4. Create new .env file (You can use .env.example for reference)
5. Make sure your .env has all the necessary configurations (database, google, etc)
6. In terminal run "php artisan migrate:fresh" then "php artisan serve"
