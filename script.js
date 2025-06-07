//Empêcher qu'un email vide ou mal écrit soit envoyé//
document.querySelector("form").addEventListener("submit",function(e){
    const email= document.getElementById("email").value;
    if (!email.includes("@")) {
    e.preventDefault();
    alert("Veuillez entrer un email valide.");
  }
});
//Envoyer un message de confirmation après avoir remplis et envoyer un formulaire//
document.getElementById("newsletter-form").addEventListener("submit",function(e){
    e.preventDefault();
    alert("Merci pour votre inscription !!");
});