<?php
include("include/config.php");

$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";
try {
    $pdo = new PDO($dsn, $user, $pass);
    // requete simple
    // $sql = "SELECT * FROM jeux";
    // $query = $pdo->query($sql);
    // $data = $query->fetchAll(PDO::FETCH_OBJ);
    // var_dump($data);

    //requetes préparées
    //$sql = "SELECT * FROM jeux WHERE jeux_titre LIKE :search";
    // $sql = "SELECT * FROM jeux WHERE jeux_titre LIKE :search AND jeux_prix >= :prix";
    $sql = "SELECT * FROM jeux";
    //$search = "ba";

    $query = $pdo->query($sql);

    // $query = $pdo->prepare($sql);
    // // methode 1
    // //$query->execute([":search" => '%' . $search . '%']);
    // $query->execute([":search" => '%' . $search . '%', ":prix" => 30]);

    // methode 2
    // $query->bindValue(":search", '%' . $search . '%');
    // $query->bindValue(":prix", 30);
    // $query->execute();

    // methode 3
    // $query->bindParam(":search", '%' . $search . '%');
    // $query->execute();

    // while ($data = $query->fetch(PDO::FETCH_OBJ)) {
    //     // echo "- ";
    //     foreach ($data as $cle => $valeur) {
    //         echo "- " . $cle . " -> " . $valeur . "\n";
    //     }
    //     echo "--------------------------------------\n";
    //     //        echo "- " . $data->Jeux_Titre . " (" . $data->Jeux_Prix . " €) : " . (new DateTime($data->Jeux_DateSortie))->format("d/m/Y") . "\n";
    // }
    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
        echo "- " . $data->Jeux_Titre . " (" . $data->Jeux_Prix . " €) : " . (new DateTime($data->Jeux_DateSortie))->format("d/m/Y") . "\n";
    }
    // $data = $query->fetchAll(PDO::FETCH_OBJ);
    // foreach ($data as $jeu) {
    //     echo "- " . $jeu->Jeux_Titre . " (" . $jeu->Jeux_Prix . " €) : " . (new DateTime($jeu->Jeux_DateSortie))->format("d/m/Y") . "\n";
    // }
} catch (PDOException $e) {
    var_dump($e);
}
