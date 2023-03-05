
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>


<?php
require "db_conn.php";
$cin=$_GET['cin'];
       
        $result=$conn->query(" DELETE FROM `gestion_stock`.`client` WHERE `client`.`cin` = '".$cin."';");
        header("location: indexcli.php");

?>




