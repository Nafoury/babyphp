<?php
$dsn = "mysql:host=localhost;dbname=trackerphp"; 
$user="root";
$pass="";


try{


    $con=new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    include "functions.php";


}catch(PDOException $e){
    echo $e->getMessage();

}
