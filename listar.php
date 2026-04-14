<?php
$conn = new mysqli("localhost","root","","trabalho_banco_dados");
$result = $conn->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>

<body>

<button class="toggle" onclick="toggleTheme()" id="btnTema">🌙</button>

<h2 style="text-align:center;">Usuários</h2>

<div class="lista">
<?php while($u=$result->fetch_assoc()){ ?>
<div class="card">
<?= $u['nome'] ?><br>
<?= $u['email'] ?><br>
<?= $u['idade'] ?><br><br>

<a class="btn edit" href="editar.php?id=<?= $u['id'] ?>">Editar</a>
<a class="btn delete" href="deletar.php?id=<?= $u['id'] ?>">Excluir</a>
</div>
<?php } ?>
</div>

<a href="index.php">Voltar</a>

<script>
function toggleTheme(){
 document.body.classList.toggle("light-mode");
 localStorage.setItem("tema",
 document.body.classList.contains("light-mode")?"light":"dark");
 atualizarIcone();
}

function atualizarIcone(){
 document.getElementById("btnTema").textContent =
 document.body.classList.contains("light-mode")?"☀️":"🌙";
}

window.onload=()=>{
 if(localStorage.getItem("tema")==="light"){
  document.body.classList.add("light-mode");
 }
 atualizarIcone();
}
</script>

</body>
</html>