
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>


<?php

require "db_conn.php";
if (isset($_POST['submit'])) {
  
$libelle=$_POST['libelle'];
$nomcat=$_POST['nomcat'];
$image = basename($_FILES['image']['name']);
$tmp_path = $_FILES['image']['tmp_name'];
$path = 'upload/'.$image;
move_uploaded_file($tmp_path,$path);
$prixu=$_POST['prixu'];
$prixv=$_POST['prixv'];
$stmt=$conn->query("SELECT * FROM `categorie` WHERE nomcat = '".$nomcat."'");

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $result= $conn->query("INSERT INTO `gestion_stock`.`produit` (`refp`, `libelle`,`image`, `prixu`, `stock`, `prixv`, `id`) 
    VALUES (NULL, '".$libelle."','".$image."', '".$prixu."', '0', '".$prixv."', '".$row[0]."');"); 
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="stylebut.css">
    <link rel="stylesheet" href="styleinsertprod.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

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
        <input type="radio" name="s" id="Catégories" checked>
        <input type="radio" name="s" id="Produits">
        <input type="radio" name="s" id="Commandes">
        <input type="radio" name="s" id="Clients">
        <input type="radio" name="s" id="Fournisseurs">
        <input type="radio" name="s" id="Approvisionnements">
        <div class="sidebar-menu">
            <div class="slider"></div>
            <ul>
                <li>
                    <a href="http://localhost/projetweb/home/index1.php">
                        <!-- class="active" -->
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
                <a href="http://localhost/projetweb/home/indexprod.php" class="active">
                        <span class="las la-box"></span>
                        <span>Produits</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexcom.php">
                        <span class="las la-shopping-cart"></span>
                        <span>Commandes</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexcli.php">
                        <span class="las la-users"></span>
                        <span>Clients</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexfou.php">
                        <span class="las la-address-card"></span>
                        <span>Fournisseurs</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexappr.php">
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
                </label>Produits
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
                <div class="form-style-8" style="width:710px;" >
                    <h2>Ajouter Un produit</h2>
                        
<form enctype="multipart/form-data" class=" mx-auto "  style="width:500px;" method="POST">
    <div class="form-group mx-auto " style="width:500px;">
       
        <input type="text" class="form-control" name="libelle" placeholder="LIBELLE" aria-describedby="emailHelp">
        <label for="exampleInputEmail1">IMAGE</label>

        <input type="file" class="form-control" name="image" placeholder="IMAGE" aria-describedby="emailHelp">
        <input type="text" class="form-control" name="prixu" placeholder="PRIX UNITAIRE" aria-describedby="emailHelp">
        <input type="text" class="form-control" name="prixv" placeholder="PRIX DE VENTE" aria-describedby="emailHelp">
        Catégorie: <select name="nomcat" id="" >
        <?php
                $result=$conn->query("SELECT * FROM `categorie`");
                 while ($row = $result->fetch(PDO::FETCH_NUM)) {
                 print "<option>".$row[1]."</option>";
                 }
        ?>
         </select>
    </div>
    <button type="submit" name="submit" class="btn  btn-primary">Ajouter</button>
    <a href="http://localhost/projetweb/home/indexprod.php" class="btn  btn-primary">Retour</a>
</form>
              
                </div>

            </div>
        </main>
    </div>

</body>

</html>
