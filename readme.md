# API RESTFul with 4 Endpoints

Laravel Framework: 5.7 

PHP: 7.1.4

# Installation
1: Download the zip file or git clone the project.

2: Install laravel [https://laravel.com/docs/5.7/installation].

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
2: Create a new database with the same name [DB_DATABASE] in your MySQL.

3: Go to the project root path.

4: Run the command:

```
$ composer install
```

5: Migrate data model:

```
$ php artisan migrate
```

6: Database seeding is the process of filling up our database with dummy data that we can use to test it.

```
$ php artisan db:seed --class=UsersTableSeeder
```

7: Running the aplication:
```
$ php artisan serve
```
8: Use in your browser:

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
```
REGISTER
curl -X POST http://localhost:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Administrator", "username": "admin", "email": "admin@admin.com", "password": "secret",  "password_confirmation": "secret", "permission": "admin"}'

LOGIN
curl -X POST localhost:8000/api/login \
  -H "Accept: application/json" \
  -H "Content-type: application/json" \
  -d "{\"email\": \"admin@admin.com\", \"password\": \"secret\" }"

```
