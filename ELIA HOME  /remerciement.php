<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Beta</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body class="light">
        <?php include_once 'PHP/menu.php'; ?>
        <div class="column icons">
            <a href="https://www.google.fr/"><i class="fa-brands fa-google"></i></a>
            <a href="https://twitter.com/home?lang=fr"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
          </div>

    <div class="thx">
        <?php

        if(isset($_GET['nom']) && !empty($_GET['nom']) && isset($_GET['prenom']) && !empty($_GET['prenom']) && isset($_GET['link']) && !empty($_GET['link'])){
            //vérifie avec la méthode GET (URL) si les trois paramètres (nom, prénom, code de parrainage) sont bien présent
            //strtoupper -> met en majuscules
            echo '<p class="parrainage">Merci pour votre inscription ' . strtoupper($_GET['nom']) . ' ' . $_GET['prenom'] . ', Votre code de parrainage est ' . $_GET['link'] . '</p>';
        } else {
            header('Location: index.php');
            exit();
        }

        ?>
    </div>
    <script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>
</html>