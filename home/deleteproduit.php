
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>


<?php

require "db_conn.php";

$refp=$_GET['refp'];
       
        $result=$conn->query("DELETE FROM `produit` WHERE refp = ".$refp." ");
        header("location: indexprod.php");


?> 
