# Docker Practica

Entorno web en contenedores con Nginx y PHP-FPM, además de MySQL y
phpMyAdmin.

## Requisitos

- Docker Desktop con Docker Compose habilitado.
- Puerto `8080` disponible para la aplicación y `8081` para phpMyAdmin.

## Iniciar los servicios

Desde la carpeta del proyecto, ejecuta:

```powershell
docker compose up --build -d
```

- Aplicación: [http://localhost:8080](http://localhost:8080)
- phpMyAdmin: [http://localhost:8081](http://localhost:8081)

Para consultar los registros:

```powershell
docker compose logs -f
```

Para detener los contenedores:

```powershell
docker compose down
```

Los datos de MySQL se conservan en el volumen `db_data`. Para eliminarlos
también, ejecuta `docker compose down -v`.

## Servicios

- **web**: Nginx, expuesto en el puerto `8080`.
- **php**: PHP-FPM 8.3 con las extensiones PDO y `pdo_mysql`.
- **db**: MySQL 8.0.
- **phpmyadmin**: interfaz de administración de MySQL, expuesta en el puerto
  `8081`.

El punto de entrada actual, `src/index.php`, redirige a
`/forja-heroes/src/ficha.php`. La configuración de PHP también referencia
`src/forja-heroes/php/forja.ini`. Esos archivos no están incluidos en este
repositorio en este momento; agrega la aplicación y el archivo de
configuración correspondientes para que la página funcione correctamente.

## Estructura

```text
.
├── docker-compose.yml
├── nginx/
│   └── default.conf
├── php/
│   └── Dockerfile
├── src/
│   └── index.php
└── README.md
```

## Configuración

Los puertos, servicios y credenciales de la base de datos se definen en
`docker-compose.yml`. Antes de publicar o usar este proyecto fuera de un
entorno local, reemplaza las credenciales de ejemplo y evita guardar
contraseñas reales en el repositorio.
