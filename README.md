# Sprint_0_Web de Ruiyu Chen

El objectivo del proyecto es que detecte y calcule el valor de temperatura y co2 que hay en el medio mediante y que estos valores los envia a la aplicación del móvil android mediante un emisor BLE de CO2, de cierta manera se interactua con la base de datos del servidor. Por otro lado, la página web del cliente también se puede visualizar estos valores e interactuar con ellos 

## Tabla de Contenidos

- [Descripción](#descripción)
- [Instalación](#instalación)


## Descripción

El objetivo principal de la parte de cliente web es que el usuario pueda logear a su cuenta para visualizar las mediciones que ha sido hecho por él


## Instalación

- Descargar el XAMPP y arranca el servicio Apache y MySQL
- Clonar el repositorio en dentro de htdocs
- importar la base de datos que se llama "sprint_0_servidor.sql"
- Para establecer conexión con la base de datos, sigue los siguientes pasos:
    1. Ir a la carpeta xampp/htdocs
    2. crear un fichero connection.php
    3. Copia el código: <?php $conn = mysqli_connect("localhost","root","","sprint_0_servidor"); if($conn){} else{echo "not connected";}?>
    4. Guardar los cambios y comprobar que se conecta

