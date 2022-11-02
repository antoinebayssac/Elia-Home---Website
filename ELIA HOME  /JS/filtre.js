let articles = document.querySelectorAll(".Article");
let btns = document.querySelectorAll(".Categorie > p");

function showArticle(label){
    if(label == "Catégories") { //Si conditions est vérifié répéter la fonction pour chaque éléement de l'article
        articles.forEach(article => {
            if(article.style.display == "none"){
                article.style.display = "block";
            }
        });
    } else if(label == "Domotique"){
        articles.forEach(article => {
            if(!article.classList.contains("Domotique")){
                 //si l'article ne contient pas la class Domotique, je le fait disparaitre
                article.style.display = "none";
            } else {
                // ici l'article a la class Domotique
                //vérifier ensuite si l'article n'est pas en display none, et si c'est le cas le remettre en display block
                if(article.style.display == "none"){
                    article.style.display = "block";
                }
            }
        });
    } else if(label == "Ecologique"){
        articles.forEach(article => {
            if(!article.classList.contains("Ecologique")){
                article.style.display = "none";
            } else {
                if(article.style.display == "none"){
                    article.style.display = "block";
                }
            }
        });
    }
}

btns.forEach(btn => { //repete la fonction pour l'élément btns  
    if(btn.innerHTML.includes("Catégories")){
        btn.addEventListener('click', () => {
            showArticle("Catégories");
        });
        
    }else if(btn.innerHTML.includes("Domotique")){
        
        btn.addEventListener('click', () => {
            showArticle(btn.innerHTML);
        });
    }else if(btn.innerHTML.includes("Ecologique")){
        
        btn.addEventListener('click', () => {
            showArticle(btn.innerHTML);
        });
    }
});

