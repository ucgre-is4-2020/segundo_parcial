## Instrucciones

1. Clonar el proyecto desde el repositorio desde Github, colocandose en la carpeta donde quiere que el proyecto sea clonado y ejecutar, reemplazando ugxxxx por su numero de matricula:

    `git clone URL_REPO ugXXXX`

1. Instalar el proyecto, ejecutando la instruccion de instalacion del composer en la carpeta principal, dentro de la carpeta del proyecto recien clonado:

    `composer install`

1. Crear el archivo de configuracion de base de datos .env, copiando y renombrando el archivo .env.example
1. Crear la base de datos vacia a utilizar en el motor, con el nombre solicitado, es decir, su numero de matricula. La creacion de la BD a ser utilizada debe ser realizada con la herramienta de acceso a la BD de Postgres
1. Configurar la conexion a la base de datos en el archivo .env, configurandola para Postgres

    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=54320 - lo que corresponda en su maquina
    DB_DATABASE=ugxxxx
    DB_USERNAME=usuario 
    DB_PASSWORD=********
    ```

1. Verificar en que branch se encuentra, ejecutando:

   `git branch`
     
1. ¡IMPORTANTE! - Si ve que esta en master u otro branch QUE NO SEA EL DE SU NUMERO DE MATRICULA, cambiar al branch/rama que corresponda para usted, ejecutando - reemplazar por su numero de matricula en minusculas - ¡IMPORTANTE!:

    `git checkout ugxxxx`

1. Verificar en que branch se encuentra, ejecutando y debe ver como resultado el branch con su numero de matricula:

   `git branch`
   
1. Ejecutar el comando para crear las claves de la aplicacon

    `php artisan key:generate`
    
1. Ejecutar el comando de creacion de migraciones

    `php artisan migrate`
 
1. Verificar en la base de datos se crearon algunas tablas, en la herramienta de acceso a la base de datos
1. Configurar el acceso Web y probar en el navegador. Debe visualizar la pagina principal de Laravel en el mismo
1. ¡Empezar a programar!

Una modificacion en el archivo README.
