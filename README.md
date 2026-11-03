# Stack LAMP con Docker (nginx + PHP-FPM + MySQL)

Entorno de desarrollo con tres contenedores independientes, en lugar de un
único paquete tipo XAMPP: cada servicio (servidor web, PHP y base de datos)
vive aislado en su propio contenedor y se comunica con los demás a través
de una red de Docker.

## Arquitectura

- **web** (`nginx:1.27-alpine`): recibe las peticiones HTTP en el puerto
  `8080` y reenvía las peticiones `.php` al contenedor `php` por FastCGI.
- **php** (`php:8.3-fpm-alpine`, construido desde `php/Dockerfile`): ejecuta
  el código de `src/`, incluida la extensión `pdo_mysql`.
- **db** (`mysql:8.0`): almacena los datos. `src/index.php` se conecta con
  PDO, crea una tabla de ejemplo y cuenta las visitas.

## Cómo levantarlo

```bash
git clone <url-de-tu-repo>
cd lamp-docker
docker compose up -d
```

Y abre [http://localhost:8080](http://localhost:8080) en el navegador.

Para parar y borrar los contenedores (conservando los datos de MySQL en el
volumen `db_data`):

```bash
docker compose down
```



## Estructura del repositorio

```
.
├── docker-compose.yml
├── php/
│   └── Dockerfile
├── nginx/
│   └── default.conf
├── src/
│   └── index.php
└── README.md
```
