<?php
    try{
    $conn= new PDO('mysql:host=localhost;dbname=gestion_stock','root','');
    }
    catch(PDOExeption $e){
        echo $e->getMessage();
    }
?>
