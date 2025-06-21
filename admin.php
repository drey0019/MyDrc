
<?php
// Connexion à la base de données
conn = new mysqli("localhost", "root", "", "monshop");

// Vérifier la connexion
if (conn->connect_error) {
    die("Échec de connexion : " . conn->connect_error);
}
// Ajouter un produit
if (isset(_POST['ajouter'])) {
    nom =_POST['nom'];
    prix =_POST['prix'];
    description =_POST['description'];
    image =_POST['image'];
}
    sql = "INSERT INTO produits (nom, prix, description, image) 
            VALUES ('nom', 'prix', 'description', 'image')";conn->query(sql);

// Supprimer un produit
if (isset(_GET['supprimer'])) {
    id =_GET['supprimer'];
    conn->query("DELETE FROM produits WHERE id=id");
}
// Récupérer les produits
produits =conn->query("SELECT * FROM produits");
?>

<h2>Tableau de bord - Gestion des produits</h2>
<!-- Formulaire pour ajouter -->
<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required><br>
    <input type="number" name="prix" placeholder="Prix" required><br>
    <input type="text" name="description" placeholder="Description" required><br>
    <input type="text" name="image" placeholder="Nom de l'image (ex: robe.jpg)" required><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<hr>
<!-- Affichage des produits -->
<table border="1">
    <tr>
        <th>ID</th><th>Nom</th><th>Prix</th><th>Image</th><th>Action</th>
    </tr>
    <?php while(p =produits->fetch_assoc()): ?>
    <tr>
        <td><?= p['id'] ?></td>
        <td><?=p['nom'] ?></td>
        <td><?= p['prix'] ?></td>
        <td><?=p['image'] ?></td>
        <td>
            <a href="admin.php?supprimer=<?= $p['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
