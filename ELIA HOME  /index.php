<?php
require_once 'PHP/database.php';

if(isset($_POST['send']) && !empty($_POST['send']) && $_POST['send'] === "Envoyer"){
    if(isset($_POST['Nom']) && !empty($_POST['Nom']) && isset($_POST['Prénom']) && !empty($_POST['Prénom']) && isset($_POST['Email']) && !empty($_POST['Email'])){
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prénom'];
        $email = $_POST['Email'];
        $abonnement = $_POST['liste-axes'];
        $vote = $_POST['vote']; //stock les champs du formulaire
        $parrainage = time() . uniqid();  //time renvoie le temps en secondes, uniqid renvoie un identifiant unique à chaque fois

        $insert_inscription = $bdd->prepare('INSERT INTO beta (nom, prenom, email, abonnement, vote, parrainage) VALUES (?, ?, ?, ?, ?, ?)');
        $insert_inscription->execute(array($nom, $prenom, $email, $abonnement, $vote, $parrainage));

        header('Location: remerciement.php?nom='.$nom.'&prenom='.$prenom.'&link='.$parrainage);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="JS/localstorage.js" defer></script>
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

              <div class="column title">
                <div class="ELIA2"><p class="ELIA">ELIA HOME</p></div>

                <div class="TITRE2"><p class="Titre">UNE IA QUI AUTOMATISE ET REVOLUTIONNE LE COÛT D'ENERGIE DE VOTRE MAISON</p></div>

                <a class="button" href="#Inscription" class="">
                  S'INSCRIRE GRATUITEMENT
                  <img src="./IMAGES/fleche.png" alt='#' class="fleche" />
                </a>
              </div>

              <div class="column image">
                <img src="./IMAGES/robot.png" alt='#' class="robot" />
              </div>

            </div>
            
            <div class="text-container">
                
                <div id="En savoir plus" class="main-text-produit">
                    <div class="Titre3">
                        <h2>SYSTEME ELIA HOME QU'EST CE QUE SAIS ?</h2>
                    </div>
                        <div class="Texte"><p> Il faut savoir que tout appareil domestique n’est pas réellement éteind.<br> 
                            Prennons l’exemple de la Télé sur laquelle l'IA va intervenir :<br>
                            Quand l’utilisateur éteind la télé à l’aide de la télécommande, 
                            l’IA interviendra afin de couper complètement le courant pour économiser petit à petit la consommation.<br>
                            Vous n'aurez plus qu'à lire les informations sur l'application.</p> 
                        </div>
                    </div>
                
                <div class="main-img-produit">
                    <img src="./IMAGES/telephone.png" alt='#' class="telephone" />
                </div>

            </div>

            <div class="text-formulaire">

                <div id="Inscription" class="main-text-formulaire">
                    
                    <div class="Titre4">
                        <h2>Inscription pour tester le système avec nous</h2>
                    </div>
                    <button>S'inscire</button>
                    <div class="Formulaire">
                        <form action="" method="post" id="formulaire">
                            <fieldset> 
                                <div class="P">
                                    <legend>Identification</legend>
                                        <div>
                                            <p class="red" id="err-Nom"></p>
                                                <p>Nom</p>
                                            <p>
                                            <input id="Nom" type="text" name="Nom" placeholder="Nom"/>
                                            </p>
                                        </div>
                                
                                        <div>
                                            <p class="red" id="err-Prénom"></p>
                                                <p>Prénom</p>
                                            <p>
                                            <input id="Prénom" type="text" name="Prénom" placeholder="Prénom"/>
                                            </p>
                                        </div>
                
                                        <div>
                                            <p class="red" id="err-Email"></p>
                                                <p>Email</p>
                                            <p>
                                            <input id="Email" type="email" name="Email" placeholder="Email"/>
                                            </p>
                                        </div>
                                
                                        <div>
                                            <p class="red" id="err-Axes"></p>
                                                <p>Choix d'Abonnement</p>
                                            <p>
                                                <select id="liste-axes" name="liste-axes" >
                                                    <option value="-1" selected></option>
                                                    <option value="0" >ElIA HOME 1</option>
                                                    <option value="1" >ElIA HOME 2</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="question">
                                        <p class="red" id="err-vote"></p>
                                            <p>Aimez-vous le principe que propose ELIA HOME ?</p>
                                        <p>
                                            <input type="radio" name="vote" value="oui" checked/> Oui 
                                            <input type="radio" name="vote" value="non" /> Non
                                            <input type="radio" name="vote" value="pas" /> Je ne sais pas
                                    </div>
                            
                                    <div class="envoyer">
                                        <input type="submit" name="send" value="Envoyer">
                                      </div>
                            </fieldset> 
                        </form>
                    </div>
                
                </div>

            </div>

                <div class="Temoin">TEMOIGNAGE</h2></div>
                
                <div class="avis-container">
                <?php

                $select_avis = $bdd->prepare('SELECT * FROM avis ORDER BY id DESC LIMIT 3');
                $select_avis->execute(array());
                //fetch récupère avis par avis
                while($avis = $select_avis->fetch()){
                    echo '<div class="text-avis">';
                    echo '<p>Pseudo : '.$avis['pseudo'].'</p>';
                    echo '<p>Commentaire : '.$avis['commentaire'].'</p>';
                    echo '<p>Note : '.$avis['note'].'/5</p>';
                    echo '</div>';
                }

                ?>
            </div>
        </main>


    <footer class="footer">
        <span class="copyrights">&copy; 2022 - ELIA HOME</span>
        <p href="#" class="conditions">Conditions générales de vente</p>
    </footer>
</body>
<script src="./JS/elia.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
