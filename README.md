# Docker Practica

Proyecto de práctica para ejecutar una aplicación web en contenedores Docker.
Docker Compose coordina el servidor web, PHP y la base de datos para que los
servicios puedan trabajar juntos.

## Servicios

El proyecto incluye:

- **Nginx**, que recibe las solicitudes web y las sirve en el puerto `8080`.
- **PHP-FPM**, que ejecuta el código PHP de la aplicación.
- **MySQL**, para almacenar los datos.
- **phpMyAdmin**, una interfaz web para administrar MySQL, disponible en el
  puerto `8081`.

## Iniciar el proyecto

Abre una terminal en la carpeta donde está `docker-compose.yml` y ejecuta:

```powershell
docker compose up -d
```

Cuando los contenedores estén iniciados, abre:

- Aplicación: [http://localhost:8080](http://localhost:8080)
- phpMyAdmin: [http://localhost:8081](http://localhost:8081)

## Detener los servicios

Para detener los contenedores, ejecuta:

```powershell
docker compose down
```

Los datos de MySQL se guardan en el volumen de Docker `db_data` y se conservan
al detener los servicios.
