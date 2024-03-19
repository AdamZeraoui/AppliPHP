
<?php
    session_start();
    $title = "index";
    ob_start();
?>





        <div class="position-absolute top-50 start-50 translate-middle text-center">
        
        <h1 class="text-primary">Ajouter un produit</h1>
        
        <form action="traitement.php?action=add" method="post">
            <!-- method="post" permet de définir comment les données seront envoyées -->
            <p>
                <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
                <button type="button" class="btn btn-primary position-relative"><a class="text-decoration-none link-light" href="recap.php">
                 Panier</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary border border-light rounded-circle bg-danger p-2">+99 <span class="visually-hidden">unread messages</span></span>
                </button>
        </p>
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
                        <!-- step="any" permet indique que toute valeur est autorisée, et quil ny a pas besoin dincrémentation -->
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
