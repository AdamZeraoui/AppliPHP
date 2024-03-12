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
    echo $vide = '<div class="position-absolute top-50 start-50 translate-middle alert alert-success alert-dismissible fade show" role="alert" id="liveAlertPlaceholder"> Le panier est vide.
    </div>
    <button type="button" class="position-absolute bottom-50 start-50  m-2 btn btn-primary text-primary"><a class="text-decoration-none text-white" href="index.php">Ajouter produit</a></button>';
}else{
    echo 
    "<div class=' position-absolute top-50 start-50 translate-middle '>",
    "<h1 class='text-primary text-center'>Votre Panier</h1>",
    "<div class='text-center'>",
    "<button type='button' class='m-2 btn text-primary '><a class='text-decoration-none'href='index.php'>Ajouter produit</a></button><button type='button' class='m-2 btn text-primary position-relative'>Panier<span class=' badge rounded-pill bg-secondary  border border-light rounded-circle bg-danger p-2'>+99<span class='visually-hidden'>unread messages</span></span></button> <button type='button' class='m-2 btn btn-link'><a href='traitement.php?action=clear'>Vider panier</a></button></div>",
        "<table class='w-50 p-3 mt-5 table table-bordered border-primary'>",
            "<thead class='text-center p-3 mb-2 bg-primary border border-white text-white'>",
                "<tr>",
                    "<th class='p-3 mb-2'>#</th>",
                    "<th class='p-3 mb-2'>Nom</th>",
                    "<th class='p-3 mb-2'>Prix</th>",
                    "<th class='p-3 mb-2'>-</th>",
                    "<th class='p-3 mb-2'>Quantité</th>",
                    "<th class='p-3 mb-2'>+</th>",
                    "<th class='p-3 mb-2'>Total</th>",
                    "<th class='p-3 mb-2'>Supp</th>",
                "</tr>",
            "</thead>",
            "<tbody>";
    $totalGeneral = 0;
    $totalQtt= 0;
    foreach($_SESSION['products'] as $index=> $product){
        echo "<tr>",
                "<td class='p-3 mb-2 text-center'><strong>". $index ."</td>",
                "<td class='p-3 mb-2 text-center '><strong><a class='text-decoration-none text-black' href='traitement.php?action=delete&id=".$index."'>". $product['name'] ."</a></td>",
                "<td class='p-3 mb-2 text-center'><strong>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td class='p-3 mb-2 text-center'><strong>-</th>",
                "<td class='p-3 mb-2 text-center'><strong>".$product['qtt'] ."</td>",
                "<td class='p-3 mb-2 text-center'><strong>+</th>",
                "<td class='p-3 mb-2 text-center'><strong>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none' href='traitement.php?action=delete&id=".$index."'><button type='button' class='btn-close' aria-label='Close'></button></a></th>",
            "</tr>";
        $totalGeneral+= $product['total'];
        $totalQtt += $product['qtt'];
    }
    echo "<tr>",
            "<td colspan=6 class='text-center p-3 mb-2 bg-primary border border-white text-white'><strong>Total général : </td>",
            "<td colspan=2 class=' text-center p-3 mb-2 bg-success text-white'><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
        "</tr>",       
    
    "</tbody>",
    "</table>",
    "</div>";
}
?>
</body>
</html>