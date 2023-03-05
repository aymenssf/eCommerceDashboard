
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>



<?php  require "db_conn.php"; ?> 
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
    <link rel="stylesheet" href="fontawesome.min.css">

    <link rel="stylesheet" href="styleindexprod.css">
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
        <input type="radio" name="s" id="Produits" checked>
        <input type="radio" name="s" id="Commandes">
        <input type="radio" name="s" id="Clients">
        <input type="radio" name="s" id="Fournisseurs">
        <input type="radio" name="s" id="Approvisionnements">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="http://localhost/projetweb/home/index1.php">
                        <!-- class="active" -->

                        <span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                <a href="http://localhost/projetweb/home/indexcat.php">
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
            
  <div class="search-wrapper">
        <form   method="POST">
                <input type="search" name="searchh" placeholder="Rechercher" />
                <button type="submit" name="search" class="btn  btn-primaryse" style="background-color: #027581;"><span class="las la-search" style="
    padding: 20%;
    padding-left: 1%;
    color: white;
"></span></button>

        </form>
 </div> 
            <div class="user-wrapper">
                <img src="/home/img/safiot.jpg" width="40px" height="40px" alt=" ">
                <div>
                    <h4>Safiot Store </h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
        <div class="row tm-content-row tm-mt-big" >
               
                    <div class="bg-white tm-block h-100">
                        <div class="roww">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block"></h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="insertprod.php" class="btn btn-small btn-primary">Ajouter Un produit</a>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                               
<?php
if (isset($_POST['search'])) {
    $recherche=$_POST['searchh'];
    $stmt=$conn->query("SELECT * FROM `produit` WHERE `libelle` LIKE '%$recherche%' ");
    $stmt2=$conn->query("select * from categorie");
echo "<table class=","table table-hover table-striped tm-table-striped-even mt-3"," >";
     echo "<thead>";
     echo "<tr class=","tm-bg-gray",">";
    //  echo "<th scope=","col",">&nbsp;</th>";
     echo" <th scope=","col",">IMAGE</th>";
     echo" <th scope=","col"," class=","text-center",">REF</th>";
     echo" <th scope=","col",">LIBÉLLÉ</th>";
     echo" <th scope=","col",">PRIX UNITAIRE</th>";
     echo" <th scope=","col",">PRIX VENTE</th>";
     echo" <th scope=","col",">STOCK</th>";
     echo" <th scope=","col",">CATÉGORIE</th>";
     echo" <th scope=","col",">MODIFIER</th>";
     echo" <th scope=","col",">SUPPRIMER</th>";
     echo"</tr>";
     echo"</thead>";
     echo   "</tr>";
     while($row =$stmt->fetch()) {     
        echo"<tbody>";
        echo" <tr>";
        // echo" <th scope=","row",">";
        // echo"</th>";
        echo "<td><img width='80' src='upload/". $row['image'] ."'></td>" ;
        echo"<td class=","text-center",">".$row['refp']."</td>";
        echo "<td class=","text-center",">".$row['libelle']."</td>";
        echo "<td class=","text-center",">".$row['prixu']. " MAD</td>";
        echo "<td class=","text-center",">".$row['prixv']." MAD</td>";
        echo "<td class=","text-center",">".$row['stock']."</td>";
        $cat_id=$row['id'];
        $req4 = $conn->prepare("SELECT * FROM categorie WHERE id=$cat_id ");
        $req4->execute();
        $row2 = $req4->fetch();
        echo "<td class=","text-center",">".$row2['nomcat']."</td>";
        echo" <td>";
        echo "<a href=","updateproduit.php?refp=".$row['refp']."","><i class='las la-edit'></i></a>";
         echo"</td>" ;
        echo" <td>";
        echo "<a href=","deleteproduit.php?refp=".$row['refp']."","><i class='las la-trash-alt'></i></a>";
         echo"</td>" ;
        echo " </tr>";
        echo"</tbody>";
}
}else{
$stmt=$conn->query("select * from produit");
$stmt2=$conn->query("select * from categorie");
echo "<table class=","table table-hover table-striped tm-table-striped-even mt-3"," >";
     echo "<thead>";
     echo "<tr class=","tm-bg-gray",">";
    //  echo "<th scope=","col",">&nbsp;</th>";
     echo" <th scope=","col",">IMAGE</th>";
     echo" <th scope=","col"," class=","text-center",">REF</th>";
     echo" <th scope=","col",">LIBÉLLÉ</th>";
     echo" <th scope=","col",">PRIX UNITAIRE</th>";
     echo" <th scope=","col",">PRIX VENTE</th>";
     echo" <th scope=","col",">STOCK</th>";
     echo" <th scope=","col",">CATÉGORIE</th>";
     echo" <th scope=","col",">MODIFIER</th>";
     echo" <th scope=","col",">SUPPRIMER</th>";
     echo"</tr>";
     echo"</thead>";
     echo   "</tr>";
     while($row =$stmt->fetch()) {     
        echo"<tbody>";
        echo" <tr>";
        // echo" <th scope=","row",">";
        // echo"</th>";
        echo "<td><img width='80' src='upload/". $row['image'] ."'></td>" ;
        echo"<td class=","text-center",">".$row['refp']."</td>";
        echo "<td class=","text-center",">".$row['libelle']."</td>";
        echo "<td class=","text-center",">".$row['prixu']. " MAD</td>";
        echo "<td class=","text-center",">".$row['prixv']." MAD</td>";
        echo "<td class=","text-center",">".$row['stock']."</td>";
        $cat_id=$row['id'];
        $req4 = $conn->prepare("SELECT * FROM categorie WHERE id=$cat_id ");
        $req4->execute();
        $row2 = $req4->fetch();
        echo "<td class=","text-center",">".$row2['nomcat']."</td>";
        echo" <td>";
        echo "<a href=","updateproduit.php?refp=".$row['refp']."","><i class='las la-edit'></i></a>";
         echo"</td>" ;
        echo" <td>";
        echo "<a href=","deleteproduit.php?refp=".$row['refp']."","><i class='las la-trash-alt'></i></a>";
         echo"</td>" ;
        echo " </tr>";
        echo"</tbody>";
}
}
?>
                        </div>

                        </div>
                    </div>
                
            </div>
            <!-- <button><a href="http://localhost/projetweb/home/insertcateg.php">  Modifier categorie</a> </button> -->
           

        </main>

        </main>
    </div>

</body>

</html>

</html>