# API RESTFul with 4 Endpoints

Laravel Framework: 5.7 
PHP: 7.1.4

# Installation
1: Download the zip file or git clone the project;
2: Install laravel [https://laravel.com/docs/5.7/installation];

## Configuring database
1: You must edit or create `.env` file in project's root path, configuring the DB_DATABASE, DB_USERNAME and DB_PASSWORD.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database_name
DB_USERNAME=my_username_database
DB_PASSWORD=my_password_database
```

Migrate data model:

```
$ php artisan migrate
```

## Database seeding
Database seeding is the process of filling up our database with dummy data that we can use to test it.

```
$ php artisan db:seed --class=UsersTableSeeder
```

# Running the aplication
```
$ php artisan serve
```

```
localhost:8000/api/users
```

# Test using Postman [https://www.getpostman.com/]
- **Create** User: `[POST] http://localhost:8000/api/users/`
- **Retrieve all** Users: `[GET] http://localhost:8000/api/users/`
- **Retrieve single** User: `[GET] http://localhost:8000/api/users/{id}`
- **Update** an User: `[PUT] http://localhost:8000/api/users/{id}`
- **Delete** an User: `[DELETE] http://localhost:8000/api/users/{id}`

# Test using Json and a terminal
