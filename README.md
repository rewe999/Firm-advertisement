# optAd360

This project was made as an recruitment task for [optAd360](https://pl.optad360.com/).
It's an simple app that use endpoint:
- https://api.optad360.com/get?key=HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV&startDate=2021-08-11&endDate=2021-08-11&output=json

This is a simple application that retrieves data from the api and inserts it into the database

Data can be inserted into the database using the POST method and the /firms path
Data can be viewed using GET method and path /firms (data are mapped and returned as json)

Application allows you to run a script once a day that retrieves data from API and saves them in MySQL database

## Installation
### 1. Create `.env` file based on `.env.example`:
```
copy .env.example .env
```

### 2. Fetch dependencies:
```shell script
composer install
```

### 3. Generate application key:
```shell script
 php artisan key:generate
```

### 4. Run migrations:
```shell script
 php artisan migrate
```
### 5. Now you can access the app here:
Insert data from API to database:
(method POST)
http://127.0.0.1:8000/api/firms

Get data from database:
(method GET)
http://127.0.0.1:8000/api/firms


## Author:
- [Patryk Zym](https://github.com/rewe999/)
