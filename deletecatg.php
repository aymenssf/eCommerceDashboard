
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>

<?php
require "db_conn.php";
$id=$_GET['id'];
       
        $result=$conn->query(" DELETE FROM `gestion_stock`.`categorie` WHERE `categorie`.`id` = '".$id."';");
        header("location: indexcat.php");

?>

