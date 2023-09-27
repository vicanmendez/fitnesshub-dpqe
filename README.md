# Fitness Hub Aplicación Web

## Guía de Instalación

### Requisitos Previos
Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:
- [XAMPP](https://www.apachefriends.org/index.html)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)


### Pasos de Configuración
    **Primero que todo, muévete a la carpeta de tu servidor (por defecto, C:/xampp/htdocs)**


1. **Clona el repositorio**
    git clone https://github.com/vicanmendez/fitnesshub

2. **Muevete al directorio del repositorio (también lo puedes hacer desde la interfaz gráfica y ejecutar un terminal dentro de la carpeta)**
    cd fitness-hub

3. **Instala las dependencias necesarias**
    composer update
    composer install

4. **Genera las claves necesarias**
    php artisan key:generate

5. **Crea la base de datos**
    Debes crear la base de datos para la aplicación (Ejemplo, desde el navegador web, puedes ir a to http://localhost/phpmyadmin y crearla con el nombre que quieras).

6. **Actualiza las variables de entorno**
    Copia el archivo .env.example a .env (o renombrala como .env) y pon la siguiente configuración:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

7. **Ejecuta las migraciones y seeders**
    php artisan migrate --seed

8. **Ejecuta el servidor**
    php artisan serve

9. **Abre la aplicación**
    Abre un navegador y ejecuta la aplicación en http://localhost:8000

    Usuario por defecto (admin)

    Username: admin@admin
    Password: admin


# Fitness Hub Web App

## Installation Guide

### Prerequisites
Before you begin, make sure you have the following installed on your system:
- [XAMPP](https://www.apachefriends.org/index.html)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)

### Setup Steps
   **First of all, move to your server folder (by default, C:/xampp/htdocs)**

1. **Clone the Repository**
    git clone https://github.com/vicanmendez/fitnesshub

2. **Move to the project directory**
    cd fitness-hub

3. **Install dependencies**
    composer update
    composer install

4. **Generate Application Key**
    php artisan key:generate

5. **Create Database**
    Create a new database for the application. (I.e: within the web browser, go to http://localhost/phpmyadmin and create the DB).

6. **Update environment variables**
    Copy the .env.example file to .env and update the database configuration:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

7. **Run migrations and seeders**
    php artisan migrate --seed

8. **Run the server**
    php artisan serve

9. **Go to the application**
    Open your web browser and go to http://localhost:8000

    Default User Credentials

    Username: admin@admin
    Password: admin









<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
