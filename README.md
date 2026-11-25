# Bike rent - Proyecto de laravel
## 1. Estructura de componentes y estilos

El proyecto está desarrollado con Laravel y Blade, organizando las vistas y los estilos para facilitar la reutilización y el mantenimiento del código.

### Estructura de recursos:

- app/: Contiene los Modelos y los Controladores.
- routes/: Define las URLs de la web en web.php y las de acceso de usuarios en auth.php.
- public/images y build/: Almacena las imágenes estáticas utilizadas en la página y la compilación final generada por Vite.
- resources/views/layouts/: Contiene el esqueleto HTML común a toda la web (cabecera, menú y pie de página).
- resources/views/components/: Almacena los componentes Blade reutilizables de la aplicación, como el interruptor de tema claro/oscuro, tarjetas de bicicletas, inputs o mensajes de error.
- resources/views/pages/: Agrupa el contenido específico de cada pantalla que ve el usuario (vistas principales, bikes y bookings).
- app.css y app.js: Archivos centrales que importan todo el diseño y la interactividad para compilarlos con Vite y cargarlos de una sola vez en el layout.

## Estructura de archivos js:

- app.js: archivo principal de JavaScript.
- burger-menu.js: gestión del menú de navegación.
- catalog.js: funcionalidades relacionadas con el catálogo de bicicletas.
- theme-switcher.js: gestión del cambio de tema visual.

## Carga mediante Vite
Los archivos JavaScript se encuentran dentro de resources/js y se gestionan mediante Vite, que se encarga de compilar y cargar los recursos frontend de la aplicación.

para iniciar vite se usa

npm run dev

## 3. Instrucciones de puesta en marcha

### 1. Clonar el repositorio

En la terminal, se debe ejecutar el siguiente comando para clonar el proyecto

git clone https://github.com/Aaron-Calderero/alquiler-bicicletas-RETO-Grupal-Aaron-Jhon.git
cd nombre-del-proyecto

### 2. Instalar dependencias de Laravel
Instalar las dependencias de PHP y generar la carpeta vendor mediante Composer:

Instalar las dependencias del frontend:
npm install

### 3. Configurar el entorno

Crear el archivo de configuración .env:
cp .env.example .env

Iniciar los contenedores de Laravel Sail:
./vendor/bin/sail up -d

Generar la clave de aplicación:
./vendor/bin/sail artisan key:generate

### 4. Configurar la base de datos

Ejecutar las migraciones para crear las tablas:
./vendor/bin/sail artisan migrate

Para insertar los datos de prueba:
./vendor/bin/sail artisan db:seed

### 5. Iniciar el proyecto
Ejecutar Vite para compilar y actualizar los recursos del frontend:

npm run dev
La aplicación estará disponible en:

http://localhost

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

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
