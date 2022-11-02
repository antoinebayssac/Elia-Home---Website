<?php 
  require_once 'PHP/database.php'; 
  $select_article = $bdd->prepare('SELECT * FROM article');
  $select_article->execute(array());
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./CSS/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./IMAGES/LogoBarre.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/filtre.js" defer></script>
</head>

<body class="light">
    <?php include_once 'PHP/menu.php' ?>
      <main>
          <div class="banner">

            <div class="column icons">
                <a href="https://www.google.fr/"><i class="fa-brands fa-google"></i></a>
                <a href="https://twitter.com/home?lang=fr"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
              </div>
          
            
            <div class="Categorie">
                  <p>Toutes les Catégories</p>
                  <p>Domotique</p>
                  <p>Ecologique</p>
            </div>
            
            <div class="all-Article">
              <?php

                while($article = $select_article->fetch()){
                  echo '<div class="Article '.$article['label'].' Article-1">';
                
                  echo '<div class="TitreArticle-1">';
                  echo '<p>'.$article['title'].'</p>';
                  echo '</div>';
                
                  echo '<div class="TexteArticle-1">';
                  echo substr($article['content'], 0, 1000).'...';
                
                  echo '</div>';
                  echo '<div class="ButtonArticle-1">';
                  echo '<a href="article.php?id='.$article['id'].'">'; // redirige vers la page article.php avec l'id de l'article
                  echo '<button type="submit">Lire la suite</button>';
                  echo '</a>';
                  echo '</div>';
                  echo '</div>';
                }

              ?>
            </div>        
          
          </div>  
        </main>


    <footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Condition générales de vente</p>
    </footer>
<script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>