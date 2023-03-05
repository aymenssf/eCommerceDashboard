
<?php session_start();
if (!isset($_SESSION['user_name'])){
        header("location:pglogin.php");
}
?>

<?php  
 require_once('./tcpdf/tcpdf.php');  

$dbHandler = new PDO('mysql:host=localhost;dbname=gestion_stock', 'root', '');
$dbStatment = $dbHandler->prepare("select * from commande join details_commande join produit join client on produit.refp = details_commande.refp and commande.idc = details_commande.idc and client.cin = commande.cin where commande.idc = " . $_GET['idc'] . "");
$dbStatment->execute();
$c = $dbStatment->fetch(PDO::FETCH_OBJ);

    
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facture</title>
    </head>
    <style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
        
        .container{
            width: 80%;
            margin: 0 auto;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }
        th,td{
            border: 1px solid gray;
            height:20px
            padding: 20px;
            text-align: left;
        }
        th{
            font-weight:900;
        }
        .table{
            text-align: right;
        }
        </style>
        <body>
        <h1>FACTURE</h1>
        <div class="container">
            <h4>Client :</h4>
        <hr>
            <p>Nom : ' . $c->nom . '</p>
            <p>Prenom : ' . $c->prenom . '</p>
            <p>Cin: ' . $c->cin . '</p>
            <p>Prenom : ' . $c->email . '</p>
            <p>Adress : ' . $c->adress . '</p>
            <p>Telephone : ' . $c->tel . '</p>
        <hr>  
            
            <h4> Commande :</h4>
            <hr>
            <p>ID commande : ' . $c->idc . '</p>
            <p>Date : ' . $c->date . '</p>
            <hr>
            <h4>Produits de commande: </h4>

            <table>
            <thead>
                <tr>
                    <th>produit</th>
                    <th>prix</th>
                    <th>quantite</th>
                    <th>totale</th>
                </tr>
                </thead>
                <tbody>';
    $i = 0;            
    do
    { 
        $html .= '<tr>  
                    <td>'. $c->libelle .'</td>  
                    <td>'.$c->prixv.' MAD</td>  
                    <td>'.$c->qte_produit.'</td>  
                    <td>'.$c->prixv*$c->qte_produit.' MAD</td>
                </tr>';
        $i +=$c->prixv*$c->qte_produit; 
    }
    while($c = $dbStatment->fetch(PDO::FETCH_OBJ)) ;
        
                  

    $html .= '</tbody>
        <tr>
        <th colspan="3" class="table">Montant Total TTC (MAD)</th>
        <th>' . $i . '</th>
        </tr>
        </table>
        </div>
        </body>
        </html>';


      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);   
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();    
      $obj_pdf->writeHTML($html);  
      ob_end_clean();
      $obj_pdf->Output('facture.pdf', 'I');  

 ?>  
 