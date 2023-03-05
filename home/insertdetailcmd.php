
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>

<?php

require "db_conn.php";

if (isset($_POST['submit'])) {
   $idc=$_GET['idc'];
$libelle=$_POST['libelle'];
$qte_produit=$_POST['qte_produit'];
$stmt=$conn->query("SELECT * FROM `produit` WHERE libelle = '".$libelle."'");
$stockk=$conn->query("SELECT stock FROM `produit` WHERE libelle = '".$libelle."'");
$stockk=$stockk->fetch(PDO::FETCH_OBJ);
$stockk=$stockk->stock;
if($stockk >= $qte_produit){
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $result= $conn->query("INSERT INTO `gestion_stock`.`details_commande` (`id_detail`,`idc`, `refp`,`qte_produit`) 
    VALUES (NULL,'".$idc."','".$row[0]."','".$qte_produit."');"); 
   $result2 = $conn->query("UPDATE `produit` SET stock=stock-'".$qte_produit."' WHERE `refp` = '".$row[0]."';"); 
}
}else{

    $_SESSION['status'] = "STOCK INSUFFISANT !! Veillez  entrer une quantité moins de '".$stockk."'" ;

    
  
}
}

?> 



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="fontawesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="stockalert.css">
    <link rel="stylesheet" href="tooplate.css">
    <link rel="stylesheet" href="styleinsertdetappr.css">
    <link rel="stylesheet" href="stylebut.css">

</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <span class="lab la-nom"></span>
                <span>Safiot Store</span>
            </h2>
        </div>
        <input type="radio" name="s" id="Dashboard">
        <input type="radio" name="s" id="Catégories">
        <input type="radio" name="s" id="Produits">
        <input type="radio" name="s" id="Commandes" checked>
        <input type="radio" name="s" id="Clients">
        <input type="radio" name="s" id="Fournisseurs">
        <input type="radio" name="s" id="Approvisionnements">
        <div class="sidebar-menu">
            <div class="slider"></div>
            <ul>
            <li>
                    <a href="http://localhost/projetweb/home/index1.php" >
                        <!--  -->
                        <span class="las la-igloo"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                <a href="http://localhost/projetweb/home/indexcat.php" >
                        <span class="lab la-buromobelexperte"></span>
                        <span>Catégories</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexprod.php">
                        <span class="las la-box"></span>
                        <span>Produits</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexcom.php"class="active">
                        <span class="las la-shopping-cart"></span>
                        <span>Commandes</span></a>
                </li>
                <li>
                <a href="http://localhost/projetweb/home/indexcli.php" >
                        <span class="las la-users"></span>
                        <span>Clients</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexfou.php">
                        <span class="las la-address-card"></span>
                        <span>Fournisseurs</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexappr.php" >
                        <span class="las la-shipping-fast"></span>
                        <span>Approvisionnements</span></a>
                </li>
                <li>
                    <div class="navigation">

                        <a class="button" href="logout.php">
                            <img class="imgg" src="/home/img/safiot.jpg">
                            <span class="logout"></span>
                            <span>LOGOUT</span>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h3>
                <label for="nav-toggle">
                   <span class="las la-bars"></span>
                </label>Commandes
            </h3>

            <div class="user-wrapper">
                <img src="/home/img/safiot.jpg" width="40px" height="40px" alt=" ">
                <div>
                    <h4>Safiot Store </h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

      
        <main>
                <div class="form-style-8cli" style="width:500px; height:300px" >
                    <h2>Ajouter Une Commande</h2>
                    <form  method="POST">
                        <input type="number" name="qte_produit" placeholder="quantité du produit" /><br> <br>
                      
                        Produit: <select name="libelle"  >
        <?php
                $result=$conn->query("SELECT * FROM `produit`");
                 while ($row = $result->fetch(PDO::FETCH_NUM)) {
                 print "<option>".$row[1]."</option>";
                 }
        ?>
         </select><br><br>
                        <button type="submit" name="submit" class="btn  btn-primary">Ajouter</button>
            
                        <a href="details_commande.php?idc=<?php echo $_GET['idc']; ?>" class="btn btn-small btn-primary">retour </a>
                    </form>
                    
                </div>
                <br>
                <br>
                <div class="error">
                <?php 
                            if(isset($_SESSION['status'])){
                                 echo   $_SESSION['status']; 
                                 unset($_SESSION['status']); 
                            }
                      ?>
                      </div>
        </main>
    </div>

</body>

</html>

</html>