
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
    <link rel="stylesheet" href="tooplate.css">
    <!-- <link rel="stylesheet" href="styleinsertcat.css"> -->
    <link rel="stylesheet" href="styledetailcmd.css">
    <!-- <link rel="stylesheet" href="styleindexprod.css"> -->
    

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
        <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="roww" >
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block"></h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="insertdetailcmd.php?idc=<?php echo $_GET['idc']; ?>" class="btn btn-small btn-primary">Ajouter une commande </a>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                               
<?php
      
      $idc=$_GET['idc'];
      $stmt1=$conn->query("select * from `details_commande` where idc='".$idc."'");
     echo "<table class=","table table-hover table-striped tm-table-striped-even mt-3"," >";
     echo "<thead>";
     echo "<tr class=","tm-bg-gray",">";
     echo" <th scope=","col",">idc_detail</th>";
     echo" <th scope=","col",">id commande</th>";
     echo" <th scope=","col",">image</th>";
     echo" <th scope=","col"," class=","text-center",">reference de produit</th>";
     echo" <th scope=","col",">libelle de produit</th>";
     echo" <th scope=","col",">quantité</th>";
     echo" <th scope=","col",">delete</th>";
     echo"</tr>";
     echo"</thead>";
     echo   "</tr>";
     
while ($row =$stmt1->fetch()) {    
    $cat_refp=$row['refp'];
    $req4 = $conn->prepare("SELECT * FROM produit WHERE refp=$cat_refp");
    $req4->execute();
    $row2 = $req4->fetch();  
        echo"<tbody>";
        echo" <tr>";
    
        echo"<td class=","tm-product-name",">".$row['id_detail']."</td>";
        echo "<td class=","text-center",">".$row['idc']."</td>";
        echo "<td><img width='80' src='upload/". $row2['image'] ."'></td>"    ;
        echo "<td class=","text-center",">".$row['refp']."</td>";
        echo "<td>".$row2['libelle']."</td> ";
        echo "<td>" .$row['qte_produit']."</td> ";
        echo "<td><a href=","deletedetailscmd.php?id_detail=".$row['id_detail']."&idc=".$_GET['idc']."&qte_produit=".$row['qte_produit']."&refp=".$row['refp']."","><i class='las la-trash-alt'></i></a></td>";
        echo " </tr>";
        echo"</tbody>";
}

?>
  
                        </div>

                        </div>
                    </div>
                    
                </div>
            </div>
            </main>


        </main>
    </div>

</body>

</html>

</html>