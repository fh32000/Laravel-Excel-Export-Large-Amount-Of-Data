## Laravel Project to extract big data to one file exele using appended queue job

tool used in project 
- Laravel 7.
- MySql 8.
- PHP 8.0.* or 7.3.*


### Step to run the project 

- clone project 
```bash
$ git git@github.com:fh32000/Laravel-Excel-Export-Large-Amount-Of-Data.git
```
- install packages
 ```bash
 $ composer install
 ```
- copy .env.example to .env and update your database settings 

```bash
DB_DATABASE=laravel-exel
DB_USERNAME=root
DB_PASSWORD=
```

- run optimize  
 ```bash
 $ php artisan optimize:clear
 ```

- run migrations with seeding  --this will seed 50000 user row may takes 5-60 seconds   
 ```bash
 $ php artisan migrate:fresh --force --seed
 ```
- link storage
 ```bash
 $ php artisan storage:link
 ```

- run server   
 ```bash
 $ php artisan serve
 ```

- run queue    
 ```bash
$ php artisan queue:restart 
 ```

- open browser  and run 
 ```bash
http://localhost:8000/users
 ```
- after the click in Export Excel job will run code for (10 -30 min) thin  Excel file will generate in storage/app 

***
==============================

#### New Feature:- download exported file

You Can now download exported file from localhost:8000/exports
