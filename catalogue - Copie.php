<?php
require("config/commande.php");
$produits=afficher();
?>

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
        </nav>
    </header>
    <main>
        <section class="catalogue"> 
            <h2>Vêtements disponibles</h2>
            <br>
        <?php  foreach($produits as $produit): ?>
            <div class="produit">
            <img src=" <?=produit->image?>" alt="<?=produit->nom?>">photo2 du catalogue.jpg" alt="Haut maron">
            <h3><?=produit->nom?>Haut maron</h3>
            <p>prix:<?=produit->prix?>$</p>
            <p><?=<produit->description?></p>
            <button class="Ajouter-au-panier" data-id="<?=produit->id?>">Ajouter au panier</button>
            <p>Prix: 20$</p>
            <button class="Ajouter-au-panier" data-id="1">Ajouter au panier</button>
            </div>
        <?php endforeach; ?>

            <div class="produit">
                <img src="ph10.JPG" alt="Ensemble Homme">
                <h3>Ensemble Homme</h3>
                <p>prix:30$</p>
                <button class="Ajouter-au-panier" data-id="2">Ajouter au panier</button>
            </div>

            <div class="produit">
                <img src="photo du catalogue.jpg" alt="Robe rouge">
                <h3>Robe rouge </h3>
                <p>Prix: 20$</p>
                <button class="Ajouter-au-panier" data-id="3">Ajouter au panier</button>
            </div>
        
        
            <div class="produit">
                <img src="photo3 du catalogue.jpg" alt="un ensemble rouge">
                <h3> un ensemble rouge</h3>
                <p> prix:15$</p>
                <button class="Ajouter-au-panier" data-id="4" > Ajouter au panier</button>
             </div>

               <div class="produit">
                <img src="photo4 du catalogue.PNG" alt="Robe noire">
                <h3>Robe noire</h3>
                <p>prix:25$</p>
                <button class="Ajouter-au-panier" data-id="5"> Ajouter au panier</button>
               </div>

               <div class="produit">
                <img src="ph5 du catalogue.PNG" alt="Robe">
                <h3>Robe beige</h3>
                <p>prix:35$</p>
                <button class="Ajouter-au-panier" data-id="6"> Ajouter au panier</button>
               </div>

               <div class="produit">
                <img src="ph6 du catalogue.PNG" alt="Robe courte">
                <h3>Robe fleuri </h3>
                <p>prix:25$</p>
                <button class="Ajouter-au-panier" data-id="7"> Ajouter au panier</button>
               </div>

               <div class="produit"> 
                <img src="ph7.PNG" alt="Robe blanche">
                <h3>Robe blanche</h3>
                <p>prix:28$</p>
                <button class="Ajouter-au-panier" data-id="8">Ajouter au panier</button>
               </div>

               <div class="produit">
                <img src="ph8.PNG" alt="Robe chocolat">
                <h3>Robe chocolat</h3>
                <p>pix:27$</p>
                <button class="Ajouter-au-panier" data-id="9">Ajouter au panier</button>
                 </div>

                 <div class="produit">
                    <img src="ph7 du catalogue.PNG" alt="Veste Homme">
                    <h3>Veste homme</h3>
                    <p>prix:15$</p>
                    <button class="Ajouter-au-panier" data-id="10">Ajouter au panier</button>
                 </div>
               
        </section>
    </main>
    <footer>
        <p>&copy;2025 RDC Fashion. </p>
    </footer>

    <script src="scipt.js"></script>
</body>
</html>