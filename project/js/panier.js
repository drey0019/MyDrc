// Menu emburger
function ouvrir() {
    document.getElementById('menu').classList.add('open');
}
function fermeture() {
    document.getElementById('menu').classList.remove('open');
}

// Au chargement de la page, affiche le panier
window.onload = function() {
    // Récupère le panier depuis le localStorage ou crée un tableau vide
    var panier = JSON.parse(localStorage.getItem('panier')) || [];
    var panierDiv = document.getElementById('panier-list');
    var totalDiv = document.getElementById('total-panier');
    var total = 0;

    if (panier.length === 0) {
        panierDiv.innerHTML = "<p>Votre panier est vide.</p>";
        totalDiv.innerHTML = "";
    } else {
        // Affiche chaque produit du panier
        panierDiv.innerHTML = panier.map(function(prod, index) {
            // On extrait le prix en nombre (enlève le $ si présent)
            var prixNum = parseFloat(prod.prix.replace('$',''));
            var sousTotal = prixNum * (prod.quantite ? Number(prod.quantite) : 1);
            total += sousTotal;
            return `
                <div>
                    <strong>${prod.nom}</strong> - ${prod.prix} x ${prod.quantite ? prod.quantite : 1} = ${sousTotal}$
                    <button onclick="supprimerProduit(${index})">Supprimer</button>
                </div>
            `;
        }).join('');
        totalDiv.innerHTML = "<strong>Total : </strong>" + total + "$";
    }
}

// Fonction pour supprimer un produit du panier
function supprimerProduit(index) {
    var panier = JSON.parse(localStorage.getItem('panier')) || [];
    panier.splice(index, 1); // Supprime le produit à l'index donné
    localStorage.setItem('panier', JSON.stringify(panier));
    window.location.reload(); // Recharge la page pour mettre à jour l'affichage
}