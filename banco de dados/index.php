<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<button class="toggle" onclick="toggleTheme()" id="btnTema">🌙</button>

<div class="container">
<h2>Cadastro</h2>

<form action="salvar.php" method="POST">
<input name="nome" placeholder="Nome" required>
<input name="email" placeholder="Email" required>
<input name="idade" type="number" placeholder="Idade" required min="0" max="100">
<button>Salvar</button>
</form>

<a href="listar.php">Ver usuários</a>
</div>

<?php if(isset($_GET['status'])): ?>
<div id="toast" class="toast <?= $_GET['status']=='sucesso'?'success':'error' ?>">
<?= $_GET['status']=='sucesso'?'Salvo com sucesso!':'Erro ao salvar!' ?>
</div>
<?php endif; ?>

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

 const toast=document.getElementById("toast");
 if(toast){
  setTimeout(()=>toast.classList.add("show"),100);
  setTimeout(()=>toast.classList.remove("show"),3000);
 }
}
</script>

</body>
</html>