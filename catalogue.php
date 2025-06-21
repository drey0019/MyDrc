<?php
// Connexion à la base de données
conn = new mysqli("localhost", "root", "", "monshop");

session_start();
include'db.php';
//Récupérer tousles produits
$sql="SELECT*FROM produit ORDER BY id ASC";
$stmt=$pdo->query($sql);
$produits=$stmt->fetchAll(PDO::FETCH_ASSOC);


require("config/commande.php");
$produits=afficher();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Notre Catalogue</h1>
        <nav class="lien">
            <a href="index1.html">Accueil</a>
            <a href="connexion3.html">connexion</a>
            <a href="inscription4.html">Inscrition</a>
            <div class="panier"> <a href="catalogue.html">🛒
</a> </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION['client_nom'])){
        echo'<div class="message">Bienvenue,' .htmlspecialchars($_SESSION['client_nom']). '</div>',
    }
    ?>
    <section id=shop class="products">
        <?php foreach($produits as $produit): ?>
            <div class="product-card">
                <?php if ( empty($produit['image'])): ?>
                    <img src="uploads/<?=htmlspecialchars($produit['image']) ?>" alt="<?=htmlspecialchars($produit['nom'])?>">
                <?php endif;?>
                <h4><?=htmlspecialchars($produit['nom'])?> </h4>
                <p>prix: <strong><?=htmlspecialchars($produit['prix'])?>$</strong></p>
                <p><?=htmlspecialchars($produit['description'])?> </p>
                <button class="Ajouter-au-panier" onclick="Ajouter au panier('<?=htmlspecialchars($produit['nom'])?>',<?=htmlspecialchars($produit['prix'])?>)">Ajouter au panier</button> 
                
            </div>
        <?php endforeach;?>
    </section>
    <script>
    var estconnecte= <?php echo isset($_SESSION['client_id'])? 'true':'false'; ?>;
    </script>
    <script src="panier.js"></script>
    <main>
        <section class="catalogue"> 
            <h2>Vêtements disponibles</h2>
            <br>
        <!--<?php  foreach($produits as $produit): ?>
            <div class="produit">
            <img src="images/<?=$produit->image?>"alt="<?=$produit->nom?>">
            <h3><?=$produit->nom?></h3>
            <p>prix:<?=$produit->prix?>$</p>
            <p><?=$produit->description?></p>
            <button class="Ajouter-au-panier"data-id="<?=$produit->id?>">Ajouter au panier</button>
            </div>

       <?php endforeach; ?>-->

            
        
        
        
    </main>
    <footer>
        <p>&copy;2025 RDC Fashion. </p>
    </footer>

    <script src="scipt.js"></script>
</body>
</html>