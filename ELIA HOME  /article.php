<?php

require_once 'PHP/database.php';

if (!isset($_GET['id']) || empty($_GET['id'])) { //Si une des deux est vrai alors tout est vraie.
    header('Location: Blog.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Article</title>
</head>

<body class="light">
    
    <?php include_once 'PHP/menu.php'; ?>
    <div class="column icons">
                <a href="https://www.google.fr/"><i class="fa-brands fa-google"></i></a>
                <a href="https://twitter.com/home?lang=fr"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
              </div>
    <div class="thx">
        <div class="container">
            <?php $id = $_GET['id']; //stocker dans une variable pour que ça soit plus lisible
            $select_article = $bdd->prepare('SELECT * FROM article WHERE id = ?');
            $select_article->execute(array($id));
            while ($article = $select_article->fetch()) { //on affiche les informations du tableau article avec des echo
                echo '<div class="TitreArticle">';
                echo '<h2>' . $article['title'] . '</h2>'; //On sélectionne dans le tableau article, l'information "title"
                echo '</div>';
                echo '<div class="TexteArticle">';
                echo $article['content'];
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>
<script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>