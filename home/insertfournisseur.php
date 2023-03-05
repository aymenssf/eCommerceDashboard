
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>
<?php

require "db_conn.php";
if (isset($_POST['submit'])) {
$nomf=$_POST['nomf'];
$num=$_POST['num'];
$emailf=$_POST['emailf'];
$adressf=$_POST['adressf'];
    $result= $conn->query("INSERT INTO `fournisseur` (`nomf`, `num`,`emailf`,  `adressf`) 
    VALUES ('".$nomf."', '".$num."', '".$emailf."','".$adressf."');"); 

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
        <input type="radio" name="s" id="Commandes">
        <input type="radio" name="s" id="Clients" checked>
        <input type="radio" name="s" id="Fournisseurs">
        <input type="radio" name="s" id="Approvisionnements">
        <div class="sidebar-menu">
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
                    <a href="http://localhost/projetweb/home/indexcom.php">
                        <span class="las la-shopping-cart"></span>
                        <span>Commandes</span></a>
                </li>
                <li>
                <a href="http://localhost/projetweb/home/indexcli.php" >
                        <span class="las la-users"></span>
                        <span>Clients</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexfou.php" class="active">
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
                </label>fournisseurs
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
                <div class="form-style-8four" style="width:500px;" >
                    <h2>Ajouter Un fournisseur</h2>
                    <form  method="POST">
                        <input type="text" name="nomf" placeholder="nom" />
                        <input type="text" name="emailf" placeholder="email" />
                        <input type="text" name="num" placeholder="numero de telephone" />
                        <input type="text" name="adressf" placeholder="adress" />
                        <button type="submit" name="submit" class="btn  btn-primary">ajouter</button>
                        <a href="http://localhost/projetweb/home/indexfou.php" class="btn  btn-primary">Retour</a>
                        </button>
                        
                    </form>
                </div>
        </main>

        </main>
    </div>

</body>

</html>

</html>