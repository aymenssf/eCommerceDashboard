
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>

<?php
require "db_conn.php";
$idf=$_GET['idf'];
        $result=$conn->query(" DELETE FROM `gestion_stock`.`fournisseur` WHERE `fournisseur`.`idf` = '".$idf."';");
        header("location: indexfou.php");

?>