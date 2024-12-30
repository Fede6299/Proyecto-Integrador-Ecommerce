# Proyecto-Integrador-Ecommerce

# Tienda Mates

## Web Full Stack - 2024

### Diseño
- [Figma](https://www.figma.com/design/luK1jGL1J6QmhD7JhP2phC/Proyecto-integrador?node-id=0-1&p=f&t=XUrP8VFVBpVwp6bp-0)

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
