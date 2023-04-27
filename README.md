<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Tech Stack
* __Backend:__ [Laravel 8](https://laravel.com/) / PHP 8
* __Dev environment:__ [Sail](https://laravel.com/docs/8.x/sail) / Docker
* __DB:__ [mysql](https://laravel.com/docs/8.x/sail#mysql)
* __Cache:__ [Redis cluster](https://laravel.com/docs/8.x/sail#redis)
* __Package manager:__ [Composer](https://getcomposer.org/) (Backend) / npm (Frontend)
* __API Documentation__: [swagger-ui](https://editor.swagger.io/)

<br>

## Installation
1. GIT clone
2. Copy _.env.development_  to _.env_
3. ```cd path/to/backend_coding_example```
4. Start docker containers: ```vendor/bin/sail up```
5. Create DB tables: ```vendor/bin/sail artisan migrate```
6. Install backend dependencies: ```vendor/bin/sail composer install```
7. Install frontend dependencies: ```vendor/bin/sail npm install```
8. Frontend komplieren: ```vendor/bin/sail npm run dev```
9. Fill DB with data: ```vendor/bin/sail db:seed```
10. Check possible API endpoints: http://localhost/api/v1/documentation

<br>

## Quickstart 
__API Documentation:__ http://localhost/api/v1/documentation
<br>
__Airlines:__ http://localhost/api/v1/documentation
<br>
__Passengers:__ http://localhost/api/v1/passengers/1?page=1

## Documentation

### Airlines
| Property        | Rule     | 
| --------------- |:-------------------:| 
|id        | int, unique, nullable
|name        | string, unique
|country        | string, nullbale
|logo        | string, nullbale
|slogan        | string, nullbale
|head_quarters        | string, nullbale
|website        | string, nullbale
|established        | string, nullbale

<br>

### Passengers
| Property        | Rule     | 
| --------------- |:-------------------:| 
|id        | string, unique
|name        | string, nullable
|trips        | int, nullbale
|airline        | Airline

<br><br>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
