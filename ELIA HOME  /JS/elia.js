
const btnToggle = document.querySelector('.btn-toggle');
const logoImg = document.querySelector('.logoContainer img');

btnToggle.addEventListener('click', () => {
    btnToggle.style.animation = "pulseEffect .5s linear";
    const body = document.body;
    if(body.classList.contains('dark')){

        body.classList.add('light');
        body.classList.remove('dark');
        btnToggle.innerHTML = "Dark";
        logoImg.src = "./IMAGES/Logo-2.png";


    } else if(body.classList.contains('light')){

        body.classList.add('dark');
        body.classList.remove('light');
        btnToggle.innerHTML = "Light";
        logoImg.src = "./IMAGES/Logo-2-hover.png";
        console.log(logoImg.src);
    }
    setTimeout(function() {
        //remettre à null l'animation pour ensuite pouvoir la recommencer
        btnToggle.style.animation = null;
    }, 500);
})

let burger = document.querySelector('.icones > .burger');
let nav = document.querySelector('.menu');

burger.addEventListener('click', () => {
    console.log('cc')
    nav.classList.toggle('active');
});


let btn = document.querySelector('#Inscription > button');
let form = document.querySelector('.Formulaire');
//affiche le formulaire modal et fait disparaitre le bouton s'inscrire
btn.addEventListener('click', () => {
    btn.style.display = "none";
    window.scroll({
        top: 0,
        behavior: 'smooth'
      });
    form.classList.toggle('form');
});