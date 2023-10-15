# Sprint_0_Web de Ruiyu Chen

El objetivo del proyecto es que detecte y calcule el valor de temperatura y co2 que hay en el medio mediante y que estos valores los envia a la aplicación del móvil android mediante un emisor BLE de CO2, de cierta manera se interactua con la base de datos del servidor. Por otro lado, la página web del cliente también se puede visualizar estos valores e interactuar con ellos 

## Tabla de Contenidos

- [Descripción](#descripción)
- [Instalación](#instalación)
- [Nota](#nota)

## Descripción

El objetivo principal de la parte de cliente web es que el usuario pueda logear a su cuenta para visualizar las mediciones que ha sido hecho por él


## Instalación

- Descargar el XAMPP y arranca el servicio Apache y MySQL
- Clonar el repositorio en dentro de htdocs
- Importar la base de datos que se llama "sprint_0_servidor.sql"
- Haz test de prueba con el fichero testdb.php

## Nota

Esta página web de momento no hay mediciones hacho por usuario registrado, por lo tanto la función recuperarMedicion() se muestra TODAS las mediciones que hay en la base de datos 
