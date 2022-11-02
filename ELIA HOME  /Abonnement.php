<?php

require_once 'PHP/database.php';

//isset vérifie si la variable est déclarée
//!empty vérifie si la variable n'est pas vide



if(isset($_POST['send']) && !empty($_POST['send']) && $_POST['send'] === 'Envoyer'){
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['commentaire']) && !empty($_POST['commentaire']) && isset($_POST['note']) && $_POST['note'] != ""){
        $insert_avis = $bdd->prepare('INSERT INTO avis (pseudo, commentaire, note) VALUES (?, ?, ?)');
        $insert_avis->execute(array($_POST['pseudo'], $_POST['commentaire'], $_POST['note']));
        header('Location: Abonnement.php');
        exit();
    }
}

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
    <script src="JS/abonnement.js" defer></script>
</head>

<body class="light">
    
    <?php include_once 'PHP/menu.php' ?>
           
        <main>
            <div class="column icons">
                <a href="https://www.google.fr/"><i class="fa-brands fa-google"></i></a>
                <a href="https://twitter.com/home?lang=fr"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
              </div>
            <div class="banner2">

                <div class="abonnement prime">

                    <div class="abonnement1 titre"><p>ELIA HOME 1</p></div>
                    <div class="mensuelle"><p>(abonnement mensuel)</p></div>

                    <div class="abonnement1 texte">
                        <ul>
                            <li>
                                Installation  du système gratuit<br>
                            </li>
                            <li>
                                Installation en moins de 24 heures<br>
                            </li>
                            <li>
                                Livraison gratuite<br>
                            </li>
                        
                            <li>
                                Mode d'emploi fourni<br>
                            </li>
                            <li>
                                Assurance valable pendant 5 ans<br>
                            </li>
                        </ul>
                    </div>
                        
                    <a class="button achat1" href="#Acheter" class="">
                        200€/mois
                    </a>
                </div>
    
                
                <div class="abonnement vip">
                    
                    <div class="abonnement2 titre"><p>ELIA HOME 2</p></div>
                    <div class="annuelle"><p>(abonnement annuel)</p></div>

                    <div class="abonnement2 texte">
                
                        <ul>
                            <li>
                                Installation  du système gratuit<br>
                            </li>
                            <li>
                                Installation en moins de 24 heures<br>
                            </li>
                            <li>
                                Livraison gratuite<br>
                            </li>
                            
                            <li>
                                Mode d'emploi fourni<br>
                            </li>
                            <li>
                                Assurance valable pendant 6 ans<br>
                            </li>
                        </ul>
                
                        <a class="button achat2" href="#Acheter" class="">
                            2000€/an
                        </a>
                    </div>
                </div>

            </div>
            <div class="bgvert">
                <input type="checkbox" name="garanti" id="garanti"><label for="garanti"> 1 an de plus de garanti : 20 euros</label><br>
                <input type="checkbox" name="opt2" id="opt2"><label for="opt2"> Mise à jour : 50 euros</label>

                <div class="prix">
                    <h2>Prix : 0</h2>
                </div>
            </div>
            

            <div class="formu">
                <h2>Avis</h2>
                <form action="" method="post" align="center">
                    <input type="text" name="pseudo" placeholder="Pseudo"><br>
                    <textarea name="commentaire" cols="30" rows="10" placeholder="Commentaire"></textarea><br>
                    <input type="number" name="note" min="0" max="5"><br>
                    <input type="submit" name="send" value="Envoyer">
                </form>
            </div>
        </main>


    <footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>
<script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>