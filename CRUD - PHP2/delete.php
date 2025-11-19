<?php
//code de suppression d'un jeu particulier

//si on a un Jeux_Id absent ou vide dans la requête HTTP : retour à l'index
if (empty($_GET['Jeux_Id'])) {
    header("Location: index.php");
    exit;
}

//on se connecte à la BDD
require("include/config.php");

//avant de supprimer le jeu, on vérifie s'il est référencé dans une autre table
//on prépare la requête vu qu'elle contient un élément externe
$selectJeuxPlateformeSQL = "SELECT * FROM jeuxplateforme WHERE Jeux_Id= :JeuxId";
$selectJeuxPlateforme = $pdo->prepare($selectJeuxPlateformeSQL);
//on exécute la requête depuis ce qu'on a préparé
$selectJeuxPlateforme->execute([':JeuxId' => $_GET['Jeux_Id']]);
//si le jeu est lié à des plateformes
if ($selectJeuxPlateforme->fetch()) {
    //on déclenche un comportement sur la table qui contient la clé étrangère avant de toucher à la table qui est référencée
    //dans mon cas, je vais juste supprimer le lien du jeu avec ses plateformes
    //on prépare la requête SQL
    $deleteQueryJeuxPlateformeSQL = "DELETE FROM jeuxplateforme WHERE Jeux_Id= :JeuxId";
    $deleteQueryJeuxPlateforme = $pdo->prepare($deleteQueryJeuxPlateformeSQL);
    //on exécute la requête préparée
    $deleteQueryJeuxPlateforme->execute([':JeuxId' => $_GET['Jeux_Id']]);
}


//on prépare la requête SQL
$deleteQuerySQL = "DELETE FROM jeux WHERE Jeux_Id= :JeuxId";
$deleteQuery = $pdo->prepare($deleteQuerySQL);
//on exécute la requête préparée
$deleteQuery->execute([':JeuxId' => $_GET['Jeux_Id']]);

//on redirige vers l'index
header("Location: index.php");
