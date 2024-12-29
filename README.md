# Proyecto-Integrador-Ecommerce

# Tienda Mates

## Web Full Stack - 2024

### Requerimientos
- [Instalar XAMPP](https://www.apachefriends.org/es/index.html)
- [Instalar Composer](https://getcomposer.org/download/)

### Build
- Clonar el proyecto

#### Configurar base de datos
- Duplicar y renombrar `.env.example` a `.env`
- Configurar conexión a una base de datos en el `.env`
- Crear el schema elegido en `DB_DATABASE`
- Ejecutar el script de datos `ecommerce_mate.sql`

#### Instalar proyecto
- `composer install`
- `php artisan key:generate`
- `php artisan storage:link`

### Correr el proyecto
- `php artisan serve`
