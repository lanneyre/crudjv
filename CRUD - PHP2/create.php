<?php
require("include/config.php");
$genreQuery = $pdo->query("SELECT * FROM genre");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Jeux vidéo en live</h1>
    <a href="index.php">Retour</a>
    <form action="createTraitement.php" method="post">
        <label for="Jeux_Titre">Titre du jeu</label>
        <input type="text" name="Jeux_Titre" id="Jeux_Titre" placeholder="Titre du jeu" required>
        <br>

        <label for="Jeux_Description">Description du jeu</label>
        <textarea name="Jeux_Description" id="Jeux_Description" cols="50" rows="10" required></textarea>
        <br>

        <label for="Jeux_Prix">Prix du jeu</label>
        <input type="number" name="Jeux_Prix" id="Jeux_Prix" placeholder="Prix du jeu" required>
        <br>

        <label for="Jeux_DateSortie">Date sortie du jeu</label>
        <input type="date" name="Jeux_DateSortie" id="Jeux_DateSortie" placeholder="Date sortie du jeu" required>
        <br>

        <label for="Jeux_PaysOrigine">Pays Origine du jeu</label>
        <input type="pays" name="Jeux_PaysOrigine" id="Jeux_PaysOrigine" placeholder="Pays Origine du jeu" required>
        <br>

        <label for="Jeux_Connexion">Connection</label>
        <input type="text" name="Jeux_Connexion" id="Jeux_Connexion" placeholder="Connection" required>
        <br>

        <label for="Jeux_Mode">Mode de jeu</label>
        <input type="text" name="Jeux_Mode" id="Jeux_Mode" placeholder="Mode de jeu" required>
        <br>

        <label for="Genre_Id">Genre</label>
        <select name="Genre_Id" id="Genre_Id" required>
            <option value="" disabled selected>-- Choisir un genre --</option>
            <?php
            while ($genre = $genreQuery->fetch()) {
            ?><option value="<?php echo $genre['Genre_Id']; ?>"><?php echo $genre['Genre_Titre']; ?></option> <?php
                                                                                                            }
                                                                                                                ?>
        </select>
        <br><br>
        <input type="submit" value="Envoyer">
        <input type="reset" value="Reset">
    </form>
</body>

</html>