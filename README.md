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
- Docker (Laravel Sail)
- TailwindCSS
- JavaScript (Vite)
- Dropzone (upload de imágenes)
- Intervention Image (procesamiento de imágenes)

---

## 🔐 Autenticación

- Registro de usuarios
- Login
- Logout
- Persistencia de sesión (cookies)

---

## 🧩 Funcionalidades actuales

- CRUD de posts
- Subida de imágenes
- Procesamiento de imágenes (resize/crop)
- Validación de formularios
- Middleware de autenticación

---

## 🖥️ Vistas / Rutas

- `/` → Muro principal
- `/login` → Inicio de sesión
- `/register` → Registro
- `/posts/create` → Crear post
- `/{username}` → Perfil de usuario con sus posts

---

## 🐳 Deploy / Entorno

El proyecto corre sobre Docker usando Laravel Sail.

### Comandos principales:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run dev
```

---

## 🧠 Notas técnicas

- Uso de migraciones para estructura de base de datos
- Eloquent ORM para manejo de datos
- Validaciones con `$request->validate()`
- Autenticación con `Auth::attempt()`
- Subida de archivos con Dropzone
- Procesamiento de imágenes con Intervention Image

---

## 📌 Próximas mejoras (pendiente)

- Likes a posts
- Comentarios
- Seguidores / siguiendo
- Edición de perfil
- Notificaciones
- Optimización de imágenes

---

## 📷 Objetivo

Aprender desarrollo backend con Laravel y buenas prácticas en proyectos reales.

---

## Nuevos cambios a agregar al readme

- vista /:username/posts/:id_post

- funcionalidad agregar comentario

- funcionalidad mostar comentario
- ffuncionalidad eliminar post con autenticacion de autor
