<?php
require("include/config.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<!-- DataTable CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css" />
	<!-- font awesome CSS icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<!-- style perso -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<h1>Jeux vidéo en live</h1>
	<a href="create.php">Créer jeu</a>
	<table class="table table-striped table-hover" cellspacing="5" cellpading="5" border="2" id="jeuxVideo">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Prix</th>
				<th>Date de sortie</th>
				<th>Genre</th>
				<th>Origine</th>
				<th>Mode</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($jeuxvideo = $jeuxvideoquery->fetch()) { ?>
				<!-- var_dump($jeuxvideo); -->
				<tr>
					<td><?php echo $jeuxvideo['Jeux_Id']; ?></td>
					<td><?php echo $jeuxvideo['Jeux_Titre']; ?></td>
					<td><?php echo $jeuxvideo['Jeux_Prix']; ?></td>
					<td><?php echo $jeuxvideo['Jeux_DateSortie']; ?></td>
					<td><?php echo $jeuxvideo['Genre_Titre']; ?></td>
					<td><?php echo $jeuxvideo['Jeux_PaysOrigine']; ?></td>
					<td><?php echo $jeuxvideo['Jeux_Mode']; ?></td>
					<td><a href="edit.php?Jeux_Id=<?php echo $jeuxvideo['Jeux_Id']; ?>">edit</a></td>
					<td><a href="delete.php?Jeux_Id=<?php echo $jeuxvideo['Jeux_Id']; ?>">delete</a></td>
				</tr>
			<?php }
			?>
		</tbody>
		<tfoot>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Prix</th>
				<th>Date de sortie</th>
				<th>Genre</th>
				<th>Origine</th>
				<th>Mode</th>
				<th></th>

			</tr>
		</tfoot>
	</table>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<!-- Datatables JS -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
	<!-- JS PERSO -->
	<script type="text/javascript" src="js/function.js"></script>
</body>

</html>