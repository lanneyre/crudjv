<?php

require("include/config.php");

//on crée la requête SQL d'update
$updateQuerySQL = "UPDATE jeux SET Jeux_Titre= :Jeux_Titre, Jeux_Description= :Jeux_Description, Jeux_Prix= :Jeux_Prix, Jeux_DateSortie= :Jeux_DateSortie, Jeux_PaysOrigine= :Jeux_PaysOrigine, Jeux_Connexion= :Jeux_Connexion, Jeux_Mode= :Jeux_Mode, Genre_Id= :Genre_Id WHERE Jeux_Id=:Jeux_Id";
$updateQuery= $pdo->prepare($updateQuerySQL);

$dataJeux = [
    "Jeux_Titre" => $_POST['Jeux_Titre'],
    "Jeux_Description" => $_POST['Jeux_Description'],
    "Jeux_Prix" => $_POST['Jeux_Prix'],
    "Jeux_DateSortie" => $_POST['Jeux_DateSortie'],
    "Jeux_PaysOrigine" => $_POST['Jeux_PaysOrigine'],
    "Jeux_Connexion" => $_POST['Jeux_Connexion'],
    "Jeux_Mode" => $_POST['Jeux_Mode'],
    "Genre_Id" => $_POST['Genre_Id'],
    "Jeux_Id" => $_POST['Jeux_Id']
];
$updateQuery->execute($dataJeux);
header("Location: index.php");