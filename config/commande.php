<?php


require_once("connexion.php");


function ajouter($image,$nom,$prix,$desc)
{
    $pdo = loginDatabase();
        $req=$access->prepare("INSERT INTO produits(image,nom,prix,description)VALUES($image,$nom,$prix,$desc)");
        $req->excute(array($image,$nom,$prix,$desc));
        $req->closeCursor();

}

function supprimer($id)
{
$pdo = loginDatabase();
    
        $req=$access->prepare("DELETE * FROM produits WHERE id=?");

        $req->execute(array($id));
    
}



?>