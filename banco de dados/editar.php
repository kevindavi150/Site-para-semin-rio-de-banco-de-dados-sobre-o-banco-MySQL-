<?php
$conn = new mysqli("localhost","root","","trabalho_banco_dados");

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Editar</title>
</head>

<body>

<div class="container">
<h2>Editar usuário</h2>

<form action="atualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $user['id'] ?>">

<input name="nome" value="<?= $user['nome'] ?>" required>
<input name="email" value="<?= $user['email'] ?>" required>
<input name="idade" type="number" value="<?= $user['idade'] ?>" required>

<button>Atualizar</button>
</form>

<a href="listar.php">Voltar</a>
</div>

</body>
</html>