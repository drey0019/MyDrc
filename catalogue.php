<?php
//Démarre la session pour gérer les utilisateurs connectés
session_start();
//importe les fonctions nécessaires (dont afficher())
require("config/commande.php");
//récupère la liste des produits depuis la base de données
$produits = afficher();
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
            <a href="inscription4.html">Inscription</a>
            <div class="panier"><a href="catalogue.html">🛒</a></div>
        </nav>
    </header>
    <?php
    //Affiche un message de bienvenue si l'utilisateur est connecté
    if (isset($_SESSION['client_nom'])) {
        echo '<div class="message">Bienvenue, ' . htmlspecialchars($_SESSION['client_nom']) . '</div>'; }
   
    ?>
    <main>
        <section id="shop" class="products">
            <?php foreach($produits as $produit): ?>
            <div class="product-card">
                <?php if (!empty($produit['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
                <?php endif; ?>
                <h4><?= htmlspecialchars($produit['nom']) ?></h4>
                <p>prix: <strong><?= htmlspecialchars($produit['prix']) ?>$</strong></p>
                <p><?= htmlspecialchars($produit['description']) ?></p>
                <button class="Ajouter-au-panier" onclick="ajouterAuPanier(<?= json_encode($produit['nom']) ?>, <?= json_encode($produit['prix']) ?>)">Ajouter au panier</button>
            </div>
        <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy;2025 RDC Fashion.</p>
    </footer>
    <script>
        // variable js pour savoir si l'utilisateur est connecté
        var estconnecte = <?php echo isset($_SESSION['client_id']) ? 'true' : 'false'; ?>;
        //fonction pour ajouter un produit au panier(je doit ccompleté.....)
        function ajouterAuPanier(nom, prix) {
            // Ajoute ici le code pour ajouter au panier
        
    // Récupère le panier actuel ou crée un nouveau tableau
    let panier = JSON.parse(localStorage.getItem('panier')) || [];
    // Ajoute le produit
    panier.push({ nom: nom, prix: prix });
    // Sauvegarde le panier
    localStorage.setItem('panier', JSON.stringify(panier));
            alert(nom + " ajouté au panier !");
        }
    </script>
    <script src="panier.js"></script>
    <script src="script.js"></script>
</body>
</html>

