# Prueba Developer Funiber

Buenas, mi nombre es Emanuel Titob Santamaría Tigua.
fyi.

## _Desarrollado con_

- Laravel
- MySql

## Requerimientos

- Visual Studio Code
- Docker Desktop (Docker y Docker Composer)
- Git (Manejo de versiones)

## Contenedores
- Contenedor de la aplicación para correr comando composer y npm
- Contenedor de Base de Datos (MySql, versión 5.6.51)
- Contenedor de PhpMyAdmin

Para habilitar los contenedores se deben ejecutar los siguientes pasos:

-  Ejecutar el siguiente comando para descargar imágenes e iniciar los contenedores:
  ```sh
docker-compose up -d
```
-  Se debe validar el inicio de los contenedores, por favor ejecutar el siguiente comando:
  ```sh
 docker ps
```
-  Ejecutar el siguiente comando para dar de baja los contenedores:
  ```sh
docker-compose down
```
## Instalación
En el DockerFile se encuentran instaladas las versiones para node y php: 
- Node 14 
- Php 7.4

Una vez instalados los programas procedemos a:
- Instalar las dependencias de laravel
```sh
docker-compose exec app composer install
```
- Correr las migraciones y seeders
```sh
docker-compose exec app php artisan migrate --seed
```

## Ambientes de Docker
Este archivo de composición contiene las siguientes variables de entorno:
- DB_CONNECTION el valor por defecto es mysql
- DB_HOST el valor por defecto es mysql
- DB_PORT el valor por defecto es 3306
- DB_DATABASE el valor por defecto es polimundo_db
- DB_USERNAME el valor por defecto es polimundo
- DB_PASSWORD el valor por defecto es secret

## Acceder a PhpMyAdmin
- URL: http://localhost:82
- MYSQL_ROOT_UER el valor por defecto es root
- MYSQL_ROOT_PASSWORD el valor por defecto es root

## Acceder a la aplicación 
- URL: http://localhost:81

