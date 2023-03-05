
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>
<?php 

require "db_conn.php";
if (isset($_POST['submit'])) {
    $cin=$_GET['cin'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $adress=$_POST['adress'];
$reponse = $conn->query("UPDATE `client` SET `nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."',`tel`='".$tel."',`adress`='".$adress."'
 WHERE  `client`.`cin` = '".$cin."';"); 
}
?>
 <?php
  require "db_conn.php";
  $cin=$_GET['cin'];
   $stmt=$conn->query("select * from client where cin='".$cin."'");
        while($cat=$stmt->fetch()){
            $cin=$cat['cin'];
            $nom=$cat['nom'];
            $prenom=$cat['prenom'];
            $email=$cat['email'];
            $tel=$cat['tel'];
            $adress=$cat['adress'];
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
  <link rel="stylesheet" href="stylebut.css">
    <!-- <link rel="stylesheet" href="tooplate.css"> -->
    <link rel="stylesheet" href="styleinsertcat.css">
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
        <input type="radio" name="s" id="Catégories">
        <input type="radio" name="s" id="Produits">
        <input type="radio" name="s" id="Commandes">
        <input type="radio" name="s" id="Clients" checked>
        <input type="radio" name="s" id="Fournisseurs">
        <input type="radio" name="s" id="Approvisionnements">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/home/index1.html">
                        <!--  -->

                        <span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/home/indexcat.html">
                        <span class="lab la-buromobelexperte"></span>
                        <span>Catégories</span></a>
                </li>
                <li>
                    <a href="/home/indexprod.html">
                        <span class="las la-box"></span>
                        <span>Produits</span></a>
                </li>
                <li>
                    <a href="/home/indexcom.html">
                        <span class="las la-shopping-cart"></span>
                        <span>Commandes</span></a>
                </li>
                <li>
                    <a href="/home/indexcli.html" class="active">
                        <span class="las la-users"></span>
                        <span>Clients</span></a>
                </li>
                <li>
                    <a href="http://localhost/projetweb/home/indexfou.php">
                        <span class="las la-address-card"></span>
                        <span>Fournisseurs</span></a>
                </li>
                <li>
                    <a href="/home/indexappr.html">
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
                </label>Clients
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
            
           
            <div class="form-style-8" style="width:500px;">
                <h2>Modifier Un client</h2>
                <form  method="POST">
                    <input type="text" name="cin"  value="<?php echo $cin?> " />
                    <input type="text" name="nom"  value="<?php echo $nom?> " />
                    <input type="text" name="prenom"  value="<?php echo $prenom?> " />
                    <input type="text" name="email"  value="<?php echo $email?> " />
                    <input type="text" name="tel"  value="<?php echo $tel?> " />
                    <input type="text" name="adress"  value="<?php echo $adress?> " />
                    <button type="submit" name="submit" class="btn  btn-primary">modifier</button>
                    <a href="http://localhost/projetweb/home/indexcli.php" class="btn  btn-primary">Retour</a>
                    </button>                       
                </form>
          
    </main>

        </main>
    </div>

</body>

</html>

</html>