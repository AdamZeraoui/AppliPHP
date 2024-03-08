<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatid des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
<?php //var_dump($_SESSION); 


if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
    echo "<p>Aucun produit en session..</p>";
}else{
    echo 
    "<div class=' position-absolute top-50 start-50 translate-middle'",
    "<h1 class='text-primary '>Votre Panier</h1>",
        "<table class='w-50 p-3 table table-bordered border-primary'>",
            "<thead class='p-3 mb-2 bg-primary border border-white text-white'>",
                "<tr>",
                    "<th>#</th>",
                    "<th>Nom</th>",
                    "<th>Prix</th>",
                    "<th>Quantité</th>",
                    "<th>Total</th>",
                "</tr>",
            "</thead>",
            "<tbody>";
    $totalGeneral = 0;
    foreach($_SESSION['products'] as $index=> $product){
        echo "<tr>",
                "<td>". $index ."</td>",
                "<td>". $product['name'] ."</td>",
                "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td>".$product['qtt'] ."</td>",
                "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
            "</tr>";
        $totalGeneral+= $product['total'];
    }
    echo "<tr>",
            "<td colspan=4 class='p-3 mb-2 bg-primary border border-white text-white'>Total général : </td>",
            "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
        "</tr>",       
    
    "</tbody>",
    "</table>",
    "</div>";
}

?>
</body>
</html>