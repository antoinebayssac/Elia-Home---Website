<?php
require_once 'PHP/database.php';

if(isset($_POST['send']) && !empty($_POST['send']) && $_POST['send'] === 'Inscription'){
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        $insert_user = $bdd->prepare('INSERT INTO user (email, password) VALUES (?, ?)');
        $insert_user->execute(array($_POST['email'], password_hash($_POST['password'], PASSWORD_BCRYPT))); // password_hash génère le hash du mot de passe
        header('Location: index.php');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Inscription</title>
</head>
<body class="light">

    <?php include_once 'PHP/menu.php'; ?>
    <div class="thx" align="center">
        <h2>Inscription</h2>
        <form action="" method="post">
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required><br>
            <input type="submit" name="send" value="Inscription">
        </form>
    </div>
    <footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>
<script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>