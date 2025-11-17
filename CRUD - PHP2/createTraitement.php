<?php
// var_dump($_POST);

require("include/config.php");


// requete classique dangereuse
// $createQuerySQL = "INSERT INTO `jeux` (`Jeux_Id`, `Jeux_Titre`, `Jeux_Description`, `Jeux_Prix`, `Jeux_DateSortie`, `Jeux_PaysOrigine`, `Jeux_Connexion`, `Jeux_Mode`, `Genre_Id`) VALUES (NULL, '" . $_POST['Jeux_Titre'] . "', '" . $_POST['Jeux_Description'] . "', " . $_POST['Jeux_Prix'] . ", '" . $_POST['Jeux_DateSortie'] . "', '" . $_POST['Jeux_PaysOrigine'] . "', '" . $_POST['Jeux_Connexion'] . "', '" . $_POST['Jeux_Mode'] . "', '" . $_POST['Genre_Id'] . "') ";

// // echo $createQuerySQL;

// $pdo->query($createQuerySQL);

// requete préparée
$createQuerySQL = "INSERT INTO `jeux` (`Jeux_Titre`, `Jeux_Description`, `Jeux_Prix`, `Jeux_DateSortie`, `Jeux_PaysOrigine`, `Jeux_Connexion`, `Jeux_Mode`, `Genre_Id`) VALUES ( :Jeux_Titre, :Jeux_Description, :Jeux_Prix, :Jeux_DateSortie, :Jeux_PaysOrigine, :Jeux_Connexion, :Jeux_Mode, :Genre_Id) ";
$createQuery = $pdo->prepare($createQuerySQL);

$dataJeux = [
    "Jeux_Titre" => $_POST['Jeux_Titre'],
    "Jeux_Description" => $_POST['Jeux_Description'],
    "Jeux_Prix" => $_POST['Jeux_Prix'],
    "Jeux_DateSortie" => $_POST['Jeux_DateSortie'],
    "Jeux_PaysOrigine" => $_POST['Jeux_PaysOrigine'],
    "Jeux_Connexion" => $_POST['Jeux_Connexion'],
    "Jeux_Mode" => $_POST['Jeux_Mode'],
    "Genre_Id" => $_POST['Genre_Id']
];

$createQuery->execute($dataJeux);
header("Location: index.php");
