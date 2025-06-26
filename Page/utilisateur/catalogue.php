<?php

require_once('../config/connexion.php');
// Récupérer tous les produits de la base de données
$bd = loginDatabase();
$produits = $bd->query("SELECT * FROM produits ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalogue</title>
    <link rel="stylesheet" href="../style2.css">
</head>
<body>
    <header class="fond-du-header">
        <h1>Notre Catalogue</h1>
        <nav class="lien">
            <a href="../index.html">Accueil</a>
            <a href="../connexion.html">connexion</a>
            <a href="../inscription.html">Inscription</a>
            <div class="panier"><a href="catalogue.html">🛒</a></div>
        </nav>
    </header>
    <main>
        <section id="shop" class="products">
            <?php while($p = $produits->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['nom']) ?>" style="height:150px;object-fit:cover;">
                <h4><?= htmlspecialchars($p['nom']) ?></h4>
                <p>prix: <strong><?= htmlspecialchars($p['prix']) ?>$</strong></p>
                <p><?= htmlspecialchars($p['description']) ?></p>
                <button class="Ajouter-au-panier" onclick="ajouterAuPanier(<?= json_encode($p['nom']) ?>, <?= json_encode($p['prix']) ?>)">Ajouter au panier</button>
            </div>
            <?php endwhile; ?>
        </section>
    </main>
    <footer>
        <p>&copy;2025 RDC Fashion.</p>
    </footer>
    <script>
        var estconnecte = <?php echo isset($_SESSION['client_id']) ? 'true' : 'false'; ?>;
        function ajouterAuPanier(nom, prix) {
            let panier = JSON.parse(localStorage.getItem('panier')) || [];
            panier.push({ nom: nom, prix: prix });
            localStorage.setItem('panier', JSON.stringify(panier));
            alert(nom + " ajouté au panier !");
        }
    </script>
    <script src="panier.js"></script>
    <script src="script.js"></script>
</body>
</html>

