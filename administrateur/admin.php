<?php
// Connexion à la base de données
require_once('../config/connexion.php');
require_once('../config/commande.php');


$db = loginDatabase();
$conn = $db;
// $req = $db->prepare("SELECT * FROM produits ORDER BY id DESC");
// $p = $req->execute();

// Ajouter un produit si le formulaire est soumis
if (isset($_POST['ajouter'])) {
    // Sécuriser les entrées utilisateur
    $nom = htmlspecialchars($_POST['nom']);
    $prix = ($_POST['prix']);
    $description = htmlspecialchars($_POST['description']);
    // $image = htmlspecialchars($_POST['image']);
    // Gestion de l'upload d'image (optionnel, à adapter selon votre logique)
    $uploadDir ='../image/'.'/'; // Répertoire de destination des images
    if (!is_dir($uploadDir)){
        mkdir($uploadDir, permissions: true);
    }
     $image = $uploadDir .basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);

    // Requête d'insertion SQL
    $stmt = $db->prepare("INSERT INTO produits (nom, prix, description, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prix, $description, $image]);

    header("Location: admin.php?sucess=1");
    exit;
}

// Supprimer un produit si le paramètre 'supprimer' est présent dans l'URL
if (isset($_GET['supprimer'])) {
    $id = intval($_GET['supprimer']); // Sécuriser l'ID
    $conn->query("DELETE FROM produits WHERE id=$id");
}

// Récupérer tous les produits de la base de données
$produits = $conn->query("SELECT * FROM produits");
?>

<h2>Tableau de bord - Gestion des produits</h2>
<!-- Formulaire pour ajouter un produit -->
<form method="POST"  enctype="multipart/form-data">
    <h3>Ajouter un produit</h3>
    <input type="text" name="nom" placeholder="Nom" required><br>
    <input type="number" name="prix" placeholder="Prix" required><br>
    <input type="text" name="description" placeholder="Description" required><br>
    <input type="file" name="image" accept="image/*" placeholder="Nom de l'image (ex: robe.jpg)" required><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<hr>
<!-- Affichage des produits dans un tableau -->
<table border="1">
    <tr>
        <th>ID</th><th>Nom</th><th>Prix</th><th>Image</th><th>Action</th>
    </tr>
    <?php while($p = $produits->fetch()): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nom'] ?></td>
        <td><?= $p['prix'] ?></td>
        <!-- Affichage sécurisé du nom de l'image -->
        <td><img src="<?=htmlspecialchars($p['image'])?>" height="150"></td>
        <td>
            <!-- Lien pour supprimer le produit avec confirmation -->
            <a href="admin.php?supprimer=<?= $p['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr>
    <?php endwhile; 
    
    ?>
</table>
