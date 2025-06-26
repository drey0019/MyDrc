let panier = JSON.parse(localStorage.getItem('panier') || '[]');
let total = 0;

function ajouterAuPanier(nom,prix) {
    if (typeof estConnecte !=="undefined" && !estConnecte()) {
        alert("Veuillez vous connecter pour ajouter des articles au panier.");
        return;
    }
    
}