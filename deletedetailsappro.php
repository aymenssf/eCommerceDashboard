
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>

<?php

require "db_conn.php";

$ida_details=$_GET['ida_details'];
        
        $result=$conn->query("DELETE FROM `details_appro` WHERE ida_details = ".$ida_details." ");
        $result2 = $conn->query("UPDATE `produit` SET stock=stock-".$_GET['qtea_produit']." WHERE `refp` = ".$_GET['refp'].";"); 
        header("location: details_appro.php?ida=".$_GET['ida']."");


?> 