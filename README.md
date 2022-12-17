#Clears Cache,route cache, Setting cache...
    php artisan optimize:clear
#Clears Config Cache
    php artisan config:clear
#Creates Seeder file
    php artisan make:seeder PermissionsSeeder
#Create model with migration and controller
    php artisan make:model Model_Name -mcr
#create model
	php artisan make:model Model_Name

#create model with migration
 	php artisan make:model Model_Name -m
# Laravel debugger
     composer require barryvdh/laravel-debugbar --dev
#Telescope for  log entries , database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more
    composer require laravel/telescope
# Refresh individual file
    php artisan migrate:refresh --path=/database/migrations/2022_12_09_025608_create_semesters_table.php
