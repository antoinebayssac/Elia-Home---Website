<?php

session_start();
require_once 'PHP/database.php';

//vérifier si il est connecté
//vérifier si la variable de session n'existe pas, ou alors si elle est vide, et si une des deux conditions est vraie, alors il n'est pas connecté et je le redirige
if (!isset($_SESSION['connect']) || empty($_SESSION['connect'])) {
    header('Location: connexion.php');
    exit();
}

if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && !empty($_GET['id'])) {
    $delete_avis = $bdd->prepare('DELETE FROM avis WHERE id = ?');
    $delete_avis->execute(array($_GET['id']));
    header('Location: panelavis.php');
    exit();
}

$select_avis = $bdd->prepare('SELECT * FROM avis');
$select_avis->execute(array());

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Panel - Avis</title>
</head>
<body class="light">
<?php include_once 'PHP/menu.php'; ?>
<div class="thx">
    <div class="container" align="center">
        <?php while($avis = $select_avis->fetch()){
            echo '<div class="text-avis">';
            echo '<p>Pseudo : '.$avis['pseudo'].'</p>';
            echo '<p>Commentaire : '.$avis['commentaire'].'</p>';
            echo '<p>Note : '.$avis['note'].'/5</p>';
            echo '</div>';
            echo '<a class="ButtonArticle-1" href="panelavis.php?action=delete&id=' . $avis['id'] . '">';
            echo '<button type="submit">Supprimer</button>';
            echo '</a>';
        }
        ?>
    </div>
</div>
<script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>
</html>