<?php 
    $dbhost = "localhost"; //Host del mysql 
    $dbuser = "tu_usuario_de_mysql"; //Usuario del mysql 
    $dbpass = "la_clave"; //Password del mysql 
    $db = "base_de_datos"; //db donde se creará la tabla users 
     
    //conectamos y seleccionamos db 
    mysql_connect("$dbhost","$dbuser","$dbpass"); 
    mysql_select_db("$db"); 
    session_start(); 
?>
