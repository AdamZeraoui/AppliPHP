<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Produit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body> -->

<?php
    session_start();
    ob_start();
?>

    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <p>
                <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
                <button type="button" class="btn btn-primary position-relative"><a class="text-decoration-none link-light" href="recap.php">
                 Panier</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary border border-light rounded-circle bg-danger p-2">+99 <span class="visually-hidden">unread messages</span></span>
                </button>
        </p>

        <h1 class="text-primary">Ajouter un produit</h1>
        
        <form action="traitement.php?action=add" method="post">
            <!-- method="post" permet de définir comment les données seront envoyées -->
            <div class="mb-3">
                <p>
                    <label class="form-label text-sm-start">
                        Nom du produit :<br>
                        <input class="form-control" id="formGroupExampleInput " type="text" name="name"> 
                    </label>
                </p>
                <p>
                    <label class="form-label text-sm-start">
                        Prix du produit en € :<br>
                        <input class="form-control" type="number" step="any" name="price">
                        <!-- step="any" permet indique que toute valeur est autorisée, et qu'il n'y a pas besoin d'incrémentation -->
                    </label>
                </p>
                <p>
                    <label class="form-label text-sm-start">
                        Quantité désirée : <br>
                        <input class="form-control" type="number" name="qtt" value="1">
                    </label>
                </p>
                <p>
                    <input class="btn btn-primary" id="liveAlertBtn" type="submit" name="submit" value="Ajouter le produit">

                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="liveAlertPlaceholder"> Produit ajouter au panier avec succée.  
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </p>
            </div>
        </form>
    </div>

<?php

$content = ob_get_clean();
require_once "template.php";
?>
<!-- </body>
</html> -->