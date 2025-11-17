<?php
if (empty($_GET['Jeux_Id'])) {
    header("Location: index.php");
    exit;
}
require("include/config.php");

$testJeuxQuery = $pdo->prepare("SELECT * FROM jeux WHERE Jeux_Id = :Jeux_Id");
$jeuxVideo = $testJeuxQuery->execute(["Jeux_Id" => $_GET['Jeux_Id']]);

if ($testJeuxQuery->rowCount() == 0) {
    header("Location: index.php");
    exit;
}

$genreQuery = $pdo->query("SELECT * FROM genre");

echo $_GET['Jeux_Id'] . " existe !";
