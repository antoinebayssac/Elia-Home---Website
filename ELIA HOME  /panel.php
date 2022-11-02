<?php
session_start();
require_once 'PHP/database.php';
if (!isset($_SESSION['connect']) || empty($_SESSION['connect'])) {
    header('Location: connexion.php');
    exit();
}

if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && !empty($_GET['id'])) {
    $delete_article = $bdd->prepare('DELETE FROM article WHERE id = ?');
    $delete_article->execute(array($_GET['id']));
    header('Location: panel.php');
    exit();
}

if(isset($_POST['send']) && !empty($_POST['send']) && $_POST['send'] == 'Ajouter'){
    if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['label']) && !empty($_POST['label']) && isset($_POST['content']) && !empty($_POST['content'])){
        $insert_article = $bdd->prepare('INSERT INTO article (title, content, label) VALUES (?, ?, ?)');
        $insert_article->execute(array($_POST['title'], $_POST['content'], $_POST['label']));
        header('Location: panel.php');
        exit();
    }
}

$select_article = $bdd->prepare('SELECT * FROM article');
$select_article->execute(array());



?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>Panel</title>
</head>

<body class="light">

    <?php include_once 'PHP/menu.php'; ?>
    <div class="thx">
        <div class="container">
            <?php

            while ($article = $select_article->fetch()) {
                echo '<div class="Article ' . $article['label'] . ' Article-1">';

                echo '<div class="TitreArticle">';
                echo '<p>' . $article['title'] . '</p>';
                echo '</div>';

                echo '<div class="TexteArticle">';
                echo substr($article['content'], 0, 1000).'...';

                echo '</div>';
                echo '<div class="ButtonArticle-1">';
                echo '<a href="panel.php?action=delete&id=' . $article['id'] . '">';
                echo '<button type="submit">Supprimer</button>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }

            ?>

            <form action="" method="post" id="formarticle">
                <input type="text" name="title" id="title" placeholder="Titre" required>
                <div id="content">

                </div>
                <input type="text" id="contenthidden" name="content" hidden>
                <select name="label" id="label">
                    <option value="Domotique">Domotique</option>
                    <option value="Ecologique">Ecologique</option>
                </select>
                <input type="submit" name="send" value="Ajouter">
            </form>
        </div>
    </div>
    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#content', {
            theme: 'snow'
        });

        let form = document.querySelector('#formarticle');
        let hidden = document.querySelector('#contenthidden');


        form.addEventListener('submit', (e) => {
            let delta = quill.root.innerHTML; //récupère le html de ce qu'on a marqué dans l'éditeur
            hidden.value = delta; //met ce même html qu'on a récupéré de l'éditeur, dans l'input "caché" pour que ça puisse être envoyé en POST
        });
    </script>
    <script src="./JS/elia.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>

</html>