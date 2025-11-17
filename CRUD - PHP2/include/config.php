<?php
$user = "admin";
$pass = "Y@tta!6623";
$host = "localhost";
$dbname = "jeuxvideo";
$msgKO = "";
$msgOK = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    $jeuxvideoquery = $pdo->query("SELECT * FROM jeux JOIN genre USING (Genre_Id)");
} catch (PDOException $e) {
    // s'il y a une erreur je la stocke dans ma variable
    echo "Erreur !: " . $e->getMessage() . "<br/>";
}
