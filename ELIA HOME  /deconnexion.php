<?php
session_start();
if ((isset($_SESSION['connect']) && !empty($_SESSION['connect']))) {
    //supprime ses données de session et détruit la session
    session_unset();
    session_destroy();

    header('location: index.php');
    exit();
} else {
    header('location: index.php');
    exit();
}
