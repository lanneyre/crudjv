<?php
include("include/config.php");

$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";
// $jeuxId = "1 OR Jeux_Id IS NOT NULL";
$jeuxId = "1; DROP DATABASE test;";
//$jeuxId = 2;
try {
    $pdo = new PDO($dsn, $user, $pass);
    // requetes préparées

    // $sql = "SELECT p.* FROM plateforme AS p JOIN jeuxplateforme AS jp USING(Plateforme_Id) WHERE jp.Jeux_Id = :Jeux_Id";
    // $query = $pdo->prepare($sql);
    // $query->execute([":Jeux_Id" => $jeuxId]);



    //requetes simples
    $sql = "SELECT `p`.* FROM `plateforme` AS `p` JOIN `jeuxplateforme` AS `jp` USING (`Plateforme_Id`) WHERE `jp`.`Jeux_Id` = " . $jeuxId;
    //$sql = "SELECT * FROM `plateforme` JOIN `jeuxplateforme` USING (`Plateforme_Id`) WHERE `jeuxplateforme`.`Jeux_Id` = " . $jeuxId;
    $query = $pdo->query($sql);

    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
        echo "- " . $data->Plateforme_Nom . "\n";
    }
} catch (PDOException $e) {
    var_dump($e);
}
