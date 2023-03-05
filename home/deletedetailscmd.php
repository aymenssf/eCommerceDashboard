
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>


<?php

require "db_conn.php";

$id_detail=$_GET['id_detail'];
       
        $result=$conn->query("DELETE FROM `details_commande` WHERE id_detail = ".$id_detail." ");
        $result2 = $conn->query("UPDATE `produit` SET stock=stock+".$_GET['qte_produit']." WHERE `refp` = ".$_GET['refp'].";"); 
        header("location: details_commande.php?idc=".$_GET['idc']."");


?> 