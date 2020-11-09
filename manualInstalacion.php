<?php

//Pasos para la creacion del CRUD en PHP

//para poder crear el CRUD se necesito instalar un editor de texto, una SGBD, un servidor web y el interprete de PHP.

//1)Instalar Visual Studio Code
/*
- Debemos instalar un editor de texto para escribir código de PHP, en este caso se instalo Visual Studio Code.
- Para su instalacion descargamos el ejecutable de Visual Studio Scode desde su pagina oficial:
  https://code.visualstudio.com/
- Luego procedemos a instalar ejecutable de Visual Studio Scode.

*/

//2) Instalar Xampp

/*

- se instalo Xampp, ya que permite instalar de forma sencilla y gratuita Apache en tu propio ordenador, sin importar 
tu sistema operativo (Linux, Windows, MAC  o Solaris), ademas incluye servidores de bases de datos como MySQL ySQLite 
con sus respectivos gestores phpMyAdmin y phpSQLiteAdmin e Incorpora también el intérprete de PHP.

- para su instalacion se descargo el ejecuctable de Xampp desde su pagina oficial: https://www.apachefriends.org/es/index.html

*/

//3) Instalar git

/*
- se instalo git para poder realizar y guardar los cambios de nuestro CRUD
- para su instalacion se descargo el ejecutable de git desde su pagina oficial: https://git-scm.com/
*/


//4) Craer nuestra base de datos en MySQL

/*

- a) Nos dirijimos a la pagina localhost : https://git-scm.com/
- b) Damos click en phpMyAdmin 
- c) podemos crear la base de datos de dos formas: 
    - utilizar la instruccion CREATE DATABASE NombreBD
    - o dar click en la opcion nueva 

*/

//5) Crear nuestras entidades o tablas

/*
- una vez creada la base de datos, creamos nuestras entidades, hay dos formas:
    - a) utlizar la instruccion :

    CREATE TABLE Tienda (
    ID int(11) AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(255),
    Fecha_apertura Date  
    );

    CREATE TABLE Producto (
    SKU int(11) AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(255),
    Descripcion varchar(255),
    Valor int(100),
    Tienda int(11),
    FOREIGN KEY(Tienda) REFERENCES Tienda (ID)
    );

    - b) o dar click en el nombre de base de datos para que nos muestre la opcion Nueva  y poder crear entidades 
         con sus respectivos campos
*/


//6) Crear carpeta de archivo

/*

- creamos una carpeta para almacenar todos los archivos que necesitamos para la creacion del CRUD, para eso nos
dirijimos a nuestro ordenador -> Disco Local C -> Xampp -> htdocs -> NombreCarperta.

*/

//7) crear archivos de CRUD

/*
- una vez instalado visual studio code, lo abrimos y arrastramos la carpeta donde vamos almacenar todos los archivos
- una vez instalado xampp, abrimos el panel de control de Xampp e inicializamos Apache y MySQL
- luego creamos los siguientes archivos en visual studio code :
  
    a) C – Crear : createTienda.php y createProducto.php  – Para insertar datos en la base de datos (INSERT SQL Query) .
    b) R – Read : indexTienda.php y indexProducto.php – Para leer datos de la base de datos (SELECT SQL Query) .
    c) U – Update : upateTienda.php y upateProducto.php– Para actualizar los datos en la base de datos (UPDATE SQL Query) .
    d) D – Eliminar : deleteTienda.php y deleteProducto.php – Para borrar datos en la base de datos (DELETE SQL Query).
    e) El archivo dataBaseTienda.php y dataBaseTienda.php, contiene las instrucciones para conectarse a la base de datos, leer los datos, crear datos, 
      actualizar y eliminar datos.

*/


