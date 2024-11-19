# API Laravel 9.2 - Instrucciones de Instalación

## Requisitos previos
Asegúrate de tener instalado en tu sistema:
- PHP 8.0 o superior
- Composer
- Laravel instalado globalmente
- MariaDB configurado y en funcionamiento

---

## Pasos para instalar y configurar la API

1. **Clonar el proyecto o copiar los archivos**
   Copia todos los archivos del proyecto en el directorio deseado en tu sistema.

    
   git clone <URL_DEL_REPOSITORIO> nombre-del-proyecto
   
   
 2.  Ingresa al directorio del proyecto:
	cd <petri_si>




3.  Configurar las dependencias del proyecto

    Instala las dependencias de Laravel utilizando Composer:

	composer install





Edita el archivo .env para configurar la conexión con tu base de datos MariaDB. Cambia las siguientes variables según tu configuración:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<petri_nets>
DB_USERNAME=<TU_USUARIO>
DB_PASSWORD=<TU_CONTRASEÑA>


Generar la clave de la aplicación

Ejecuta el siguiente comando para generar la clave única de la aplicación Laravel:
	php artisan key:generate



+ Migrar la base de datos
Abrir la consola de mariaDB y ejecutar el siguiente comando	
   	sudo mysql -u root;
   	
Crear la base de datos
      create database petri_net;   	
      
      
Regresar a la terminal en la carpeta del proyecto y ejecuta las migraciones para crear las tablas necesarias en la base de datos:
	php artisan migrate      
  
  
    Inicia el servidor de desarrollo de Laravel:
         php artisan serve


Accede a la API en tu navegador o cliente HTTP utilizando la URL predeterminada:
		http://127.0.0.1:8000












