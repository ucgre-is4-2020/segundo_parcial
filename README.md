## Instrucciones

1. Clonar el proyecto desde el repositorio desde Github
1. Instalar el proyecto, ejecutando la instruccion de instalacion del composer en la carpeta principal    

    `composer install`

1. Crear el archivo de configuracion de base de datos .env, copiando y renombrando el archivo .env.example
1. Crear la base de datos vacia a utilizar en el motor, con el nombre solicitado
1. Configurar la conexion a la base de datos en el archivo .env

    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=54320 - lo que corresponda en su maquina
    DB_DATABASE=ugxxxx
    DB_USERNAME=usuario 
    DB_PASSWORD=********
    ```
     
1. ¡IMPORTANTE! - Cambiar al branch/rama que corresponda para usted - ¡IMPORTANTE!
1. Ejecutar el comando para crear las claves de la aplicacon

    `php artisan key:generate`
    
1. Ejecutar el comando de creacion de migraciones

    `php artisan migrate`
 
1. Verificar en la base de datos se crearon algunas tablas
1. Configurar el acceso Web y probar en el navegador. Debe visualizar la pagina principal de Laravel en el mismo
1. ¡Empezar a programar!
