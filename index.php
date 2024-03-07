<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Produit</title>
</head>
<body>
    
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        <!-- method="post" permet de définir comment les données seront envoyées -->
        <p>
            <label>
                Nom de produit :
                <input type="text" name="name"> 
            </label>
        </p>
        <p>
            <label>
                Prix de produit :
                <input type="number" step="any" name="price">
                <!-- step="any" permet indique que toute valeur est autorisée, et qu'il n'y a pas besoin d'incrémentation -->
            </label>
        </p>
        <p>
            <lable>
                Quantité désirée : 
                <input type="number" name="qtt" value="1">
            </lable>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
</body>
</html>