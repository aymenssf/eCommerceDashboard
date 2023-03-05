
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="stylebut.css">
  <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="stylebut.css">
    <link rel="stylesheet" href="styleindex1prod.css">

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
        <input type="radio" name="s" id="Dashboard" checked>
        <input type="radio" name="s" id="Catégories">
        <input type="radio" name="s" id="Produits">
        <input type="radio" name="s" id="Commandes">
        <input type="radio" name="s" id="Clients">
        <input type="radio" name="s" id="Fournisseurs">
        <input type="radio" name="s" id="Approvisionnements">

        <div class="sidebar-menu">
            <div class="slider"></div>
            <ul>
                <li>
                    <a href="http://localhost/projetweb/home/index1.php" class="active">
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
                <li>
                    <div class="navigation">

                        <a class="button" href="logout.php">
                            <img class="imgg" src="/home/img/safiot.jpg">
                            <span class="logout"></span>
                               <span>LOGOUT</span></a>
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
                </label>Dashboard
            </h3>
            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Rechercher" />
            </div> -->

            <div class="user-wrapper" style="
    margin-left: 81.5%;
    margin-top: -5%;
">
                <img src="/home/img/safiot.jpg" width="40px" height="40px" alt=" ">
                <div>
                    <h4>Safiot Store </h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards ">
                <div class="card-single ">
                    <div>
                    <h1><?php
require "db_conn.php";
$result1= $conn->query("SELECT COUNT(*) FROM client");
    printf( $result1->fetchColumn());

?></h1>
                        <span>Clients</span>
                    </div>
                    <div>
                        <span class="las la-users "></span>
                    </div>
                </div>

                <div class="card-single ">
                    <div>
                        <h1><?php
require "db_conn.php";
$result= $conn->query("SELECT COUNT(*) FROM produit");
    printf( $result->fetchColumn());

?></h1>
                        <span>Produits</span>
                    </div>
                    <div>
                        <span class="las la-box "></span>
                    </div>

                </div>

                <div class="card-single ">
                    <div>
                    <h1><?php
require "db_conn.php";
$result1= $conn->query("SELECT COUNT(*) FROM commande");
    printf( $result1->fetchColumn());

?></h1>
                        <span>Commande</span>
                    </div>
                    <div>
                        <span class="las la-shopping-cart "></span>
                    </div>
                </div>
            </div>

            <section class="recent " style ="margin-left: 20%; width:80%; margin-bottom:2%
">
                <div class="projects " >
                    <div class="card ">
                        <div class="card-header ">

                            <h3>Nouveaux Produits</h3>


                         <a href="/projetweb/home/indexprod.php" style="
    color: white";><button>Voir Tout <span class="las la-arrow-right "></a>   

                                </span>
                            </button>
                        </div>
                        <!-- <div class="card-body "> -->
                        <div class="table-responsive">
                               
                               <?php
                               $stmt=$conn->query("SELECT * FROM produit  ORDER BY refp DESC LIMIT 3 ");
                               $stmt2=$conn->query("select * from categorie");
                               echo "<table class=","table table-hover table-striped tm-table-striped-even mt-3"," >";
                                    echo "<thead>";
                                    echo "<tr class=","tm-bg-gray",">";
                                    echo" <th scope=","col"," class=","text-center",">image</th>";
                                    echo" <th scope=","col"," class=","text-center",">reference</th>";
                                    echo" <th scope=","col"," class=","text-center",">libelle</th>";
                                    echo" <th scope=","col"," class=","text-center",">categorie</th>";
                                    // echo "<th scope=","col",">&nbsp;</th>";
                                    echo"</tr>";
                                    echo"</thead>";
                                    echo   "</tr>";
                                    while($row =$stmt->fetch()) {     
                                       echo"<tbody>";
                                       echo" <tr>";
                                    //    echo" <th scope=","row",">";
                                       echo"</th>";
                                       echo "<td><img width='80' src='upload/". $row['image'] ."'></td>" ;
                                       echo"<td class=","text-center",">".$row['refp']."</td>";
                                       echo "<td class=","text-center",">".$row['libelle']."</td>";
                                       $cat_id=$row['id'];
                                       $req4 = $conn->prepare("SELECT * FROM categorie WHERE id=$cat_id ");
                                       $req4->execute();
                                       $row2 = $req4->fetch();
                                       echo "<td class=","text-center",">".$row2['nomcat']."</td>";
                                    //    echo" <td>";
                                       echo " </tr>";
                                       echo"</tbody>";
                               }
                               ?>
                                                       </div>
                        </div>
                    </div>
            </section>

        </main>
    </div>

</body>

</html>

</html>