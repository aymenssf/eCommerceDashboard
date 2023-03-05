
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
    <link rel="stylesheet" href="styleindexcli.css">
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
                <a href="http://localhost/projetweb/home/indexcli.php" class="active">
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
        <div class="row tm-content-row tm-mt-big">
               
                    <div class="bg-white tm-block h-100">
                        <div class="roww">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block"></h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="insertcli.php" class="btn btn-small btn-primarycli">Ajouter Un client</a>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                               
<?php
$stmt=$conn->query("select * from client");
echo "<table class=","table table-hover table-striped tm-table-striped-even mt-3"," >";
     echo "<thead>";
     echo "<tr class=","tm-bg-gray",">";
    //  echo "<th scope=","col",">&nbsp;</th>";
     echo" <th scope=","col",">CIN</th>";
     echo" <th scope=","col"," class=","text-center",">NOM</th>";
     echo" <th scope=","col",">PRENOM</th>";
     echo" <th scope=","col",">EMAIL</th>";
     echo" <th scope=","col",">NUM TELE</th>";
     echo" <th scope=","col",">ADRESSE</th>";
     echo" <th scope=","col",">Modifier</th>";
     echo" <th scope=","col",">Supprimer</th>";
     echo"</tr>";
     echo"</thead>";
     echo   "</tr>";
     while($row =$stmt->fetch(PDO::FETCH_NUM))  {     
        echo"<tbody>";
        echo" <tr>";
        // echo" <th scope=","row",">";
        // echo"</th>";
      
        echo"<td class=","tm-product-name",">".$row[0]."</td>";
        echo "<td class=","text-center",">".$row[1]."</td>";
        echo "<td class=","text-center",">".$row[2]."</td>";
        echo "<td class=","text-center",">".$row[3]."</td>";
        echo "<td class=","text-center",">".$row[4]."</td>";
        echo "<td class=","text-center",">".$row[5]."</td>";
        echo" <td>";
        echo "<a href=","updatecli.php?cin=".$row['0']."","><i class='las la-edit'></i></a>";
         echo"</td>" ;
        echo" <td>";
        echo "<a href=","deleteclient.php?cin=".$row['0']."","><i class='las la-trash-alt'></i></a>";
         echo"</td>" ;
        echo " </tr>";
        echo"</tbody>";
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