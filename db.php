<?php

//crear conexion a la base de datos
$db_host="localhost";
$db_username="Gargantua";
$db_password="Arrow151";
$db_database="app";

$db=new mysqli($db_host,$db_username,$db_password,$db_database);
mysqli_query($db,"SET NAMES 'utf8'");

if($db->connect_errno>0){
    die('no es posible conectarse a la BD['.$db->connect_error.']');


}