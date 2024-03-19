<?php
    session_start();

    ob_start();


if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
    echo'<div class="position-absolute top-50 start-50 translate-middle alert alert-success alert-dismissible fade show" role="alert" id="liveAlertPlaceholder"> Le panier est vide.
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
    foreach($_SESSION['products'] as $index=> $product){

        if($product['total']!==$product['qtt']*$product['price']){
            $product['total']=$product['qtt']*$product['price'];
            echo "<tr>",
                "<td class='p-3 mb-2 text-center'><strong>". $index ."</td>",
                "<td class='p-3 mb-2 text-center '><strong><a class='text-decoration-none text-black' href='traitement.php?action=delete&id=".$index."'>". $product['name'] ."</a></td>",
                "<td class='p-3 mb-2 text-center'><strong>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none text-black' href='traitement.php?action=down-qtt&id=".$index."'><i class='fa-regular fa-square-minus'></i></a></th>",
                "<td class='p-3 mb-2 text-center'><strong>".$product['qtt'] ."</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none text-black' href='traitement.php?action=up-qtt&id=".$index."'><i class='fa-regular fa-square-plus'></i></th>",
                "<td class='p-3 mb-2 text-center'><strong>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none' href='traitement.php?action=delete&id=".$index."'><button type='button' class='btn-close' aria-label='Close'></button></a></th>",
            "</tr>";
        $totalGeneral+= $product['total'];
        }else{
        echo "<tr>",
                "<td class='p-3 mb-2 text-center'><strong>". $index ."</td>",
                "<td class='p-3 mb-2 text-center '><strong><a class='text-decoration-none text-black' href='traitement.php?action=delete&id=".$index."'>". $product['name'] ."</a></td>",
                "<td class='p-3 mb-2 text-center'><strong>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none text-black' href='traitement.php?action=down-qtt&id=".$index."'><i class='fa-regular fa-square-minus'></i></a></th>",
                "<td class='p-3 mb-2 text-center'><strong>".$product['qtt'] ."</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none text-black' href='traitement.php?action=up-qtt&id=".$index."'><i class='fa-regular fa-square-plus'></i></th>",
                "<td class='p-3 mb-2 text-center'><strong>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td class='p-3 mb-2 text-center'><strong><a class='text-decoration-none' href='traitement.php?action=delete&id=".$index."'><button type='button' class='btn-close' aria-label='Close'></button></a></th>",
            "</tr>";
        $totalGeneral+= $product['total'];}
    }
    echo "<tr>",
            "<td colspan=6 class='text-center p-3 mb-2 bg-primary border border-white text-white'><strong>Total général : </td>",
            "<td colspan=2 class=' text-center p-3 mb-2 bg-success text-white'><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
        "</tr>",       
    
    "</tbody>",
    "</table>",
    "</div>";
}
$title = "Votre panier";
$content = ob_get_clean();
require_once "template.php";

?>
