![Laravel](https://img.shields.io/badge/Laravel-13-red)
![PHP](https://img.shields.io/badge/PHP-8.3-blue)
![License](https://img.shields.io/badge/license-MIT-green)

# 📸 DevStagram

Clon de Instagram desarrollado con Laravel.

---

## 🚀 Descripción

DevStagram es un proyecto web que replica funcionalidades básicas de Instagram, construido con el objetivo de aprender y practicar el ecosistema de Laravel, autenticación, manejo de imágenes y arquitectura MVC.

---

## ⚙️ Tecnologías

- PHP / Laravel
- MySQL
- Docker (Laravel Sail + Docker producción)
- TailwindCSS
- JavaScript (Vite)
- Dropzone (upload de imágenes)
- Intervention Image (procesamiento de imágenes)
- Nginx (servidor web en producción)

---

## 🔐 Autenticación

- Registro de usuarios
- Login
- Logout
- Persistencia de sesión (cookies)

---

## 🧩 Funcionalidades actuales

- CRUD de posts
- Subida de imágenes con drag & drop
- Procesamiento de imágenes (resize/crop)
- Validación de formularios
- Middleware de autenticación
- Comentarios en posts
- Visualización de comentarios
- Eliminación de posts (solo autor)
- Likes a posts
- Sistema de seguidores
- Edición de perfil

---

## 🖥️ Vistas / Rutas

- `/` → Muro principal
- `/login` → Inicio de sesión
- `/register` → Registro
- `/posts/create` → Crear post
- `/{username}` → Perfil de usuario
- `/{username}/posts/{id}` → Detalle de post

---

## 🐳 Entorno de desarrollo (Laravel Sail)

El proyecto utiliza Laravel Sail para desarrollo local.

### Comandos principales:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run dev
```

---

## 🚀 Entorno de producción (Docker)

Se implementó una configuración independiente para producción usando Docker.

### Servicios incluidos:

- App Laravel (PHP-FPM)
- Nginx
- MySQL
- Redis

### Levantar el proyecto:

```bash
docker compose -f docker-compose.prod.yml up -d --build
```

### Ejecutar migraciones:

```bash
docker exec -it laravel_app php artisan migrate
```

---

## ⚠️ Variables de entorno

En producción, las variables se definen directamente en `docker-compose.prod.yml`.

Ejemplo:

```yaml
environment:
    APP_ENV: production
    APP_DEBUG: false
    DB_HOST: mysql
```

---

## 🧠 Notas técnicas

- Uso de migraciones para estructura de base de datos
- Eloquent ORM para manejo de datos
- Validaciones con `$request->validate()`
- Autenticación con `Auth::attempt()`
- Subida de archivos con Dropzone
- Procesamiento de imágenes con Intervention Image (requiere extensión GD en PHP)
- Build de assets con Vite (`npm run build`)
- Separación de entorno dev vs producción

---

## 📌 Próximas mejoras

- Notificaciones
- Muro de publicaciones en inicio

---

## 📷 Objetivo

Aprender desarrollo backend con Laravel y buenas prácticas en proyectos reales, incluyendo despliegue con Docker y configuración de entornos.

---
