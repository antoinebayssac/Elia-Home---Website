let nom = document.querySelector("#Nom");
let prenom = document.querySelector("#Prénom");
let email = document.querySelector("#Email");

//si getItem ne contient pas nom alors il renvoie null 
if(window.localStorage.getItem("nom") != null){ // renvoie la valeur de l'élément de l'objet de stockage spécifié.
    //si il y a quelque chose dans mon localstorage, alors je le met dans l'input
    nom.value = window.localStorage.getItem("nom");
}

if(window.localStorage.getItem("prenom") != null){
    prenom.value = window.localStorage.getItem("prenom");
}

if(window.localStorage.getItem("email") != null){
    email.value = window.localStorage.getItem("email");
}

    //chaque modif ecoute de keyup pour l'input 
nom.addEventListener('keyup', () => {
    //sauvegarde ce qu'il y a dans l'input, dans le localstorage
    window.localStorage.setItem("nom", nom.value);
});

prenom.addEventListener('keyup', () => {
    window.localStorage.setItem("prenom", prenom.value);
});

email.addEventListener('keyup', () => {
    window.localStorage.setItem("email", email.value);
});