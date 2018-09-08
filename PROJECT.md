# API RESTFul with 4 Endpoints

Laravel Framework: 5.7

PHP: 7.1.4

# Instalação
1: Download do projeto no formato zip ou utilizando o comando git clone disponível em https://github.com/mffernando/laravel-api-restful;

2: Instalar o Framework Laravel disponível em [https://laravel.com/docs/5.7/installation];

## Configuração do Banco de Dados
1: Editar ou criar o arquivo `.env`, configurando as variáveis DB_DATABASE, DB_USERNAME and DB_PASSWORD.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database_name
DB_USERNAME=my_username_database
DB_PASSWORD=my_password_database
```

Criar as tabelas no banco de dados:

```
$ php artisan migrate
```

## Database seeding
Utilizar as seeds para popular as tabelas do banco de dados.

```
$ php artisan db:seed --class=UsersTableSeeder
```

# Executar o projeto
```
$ php artisan serve
```

```
localhost:8000/api/users
```

# Testar o projeto com o postman disponível em [https://www.getpostman.com/]
- **Create** User: `[POST] http://localhost:8000/api/users/`
- **Retrieve all** Users: `[GET] http://localhost:8000/api/users/`
- **Retrieve single** User: `[GET] http://localhost:8000/api/users/{id}`
- **Update** an User: `[PUT] http://localhost:8000/api/users/{id}`
- **Delete** an User: `[DELETE] http://localhost:8000/api/users/{id}`

# Testar usando Json e terminal
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
