let price = document.querySelector(".prix > h2");
let garanti = document.querySelector("#garanti");
let opt2 = document.querySelector("#opt2");
let offre1 = document.querySelector(".achat1");
let offre2 = document.querySelector(".achat2");
let offre1Selected = false;
let offre2Selected = false;

garanti.addEventListener('click', (e) => { 
    if(e.target.checked == true){ //on chercher si le checkbox est coché
        //parseInt = transfomer du texte en nombre
        //price.innerHTML.split(":")[1] récupère juste le nombre correspondant au prix
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) + parseInt(20));
    } else {
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) - parseInt(20));
    }
});

opt2.addEventListener('click', (e) => {
    if(e.target.checked == true){
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) + parseInt(50));
    } else {
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) - parseInt(50));
    }
});

offre1.addEventListener('click', () => { //Fonction anonyme fléché
    if(offre2Selected){
        //si l'offre 2 est déjà sélectionné, j'enlève les 2000 euros de l'offre 2
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) - parseInt(2000));
        offre2Selected = false;
    }
    if(!offre1Selected){
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) + parseInt(200));
        //Si l'offre 1 n'est pas sélectionné alors je l'ajoute, et sinon je l'enlève'
        offre1Selected = true;
    } else {
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) - parseInt(200));
        //Mis à jour de la variable
        offre1Selected = false;
    }
});

offre2.addEventListener('click', () => {
    if(offre1Selected){
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) - parseInt(200));
        offre1Selected = false;
    }
    if(!offre2Selected){
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) + parseInt(2000));
        offre2Selected = true;
    } else {
        //déselectionne l'offre 2
        price.innerHTML = "Prix : " + (parseInt(price.innerHTML.split(":")[1]) - parseInt(2000));
        offre2Selected = false;
    }
});