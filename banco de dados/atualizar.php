<?php
$conn = new mysqli("localhost","root","","trabalho_banco_dados");

$stmt = $conn->prepare("UPDATE usuarios SET nome=?,email=?,idade=? WHERE id=?");
$stmt->bind_param("ssii",
  $_POST['nome'],
  $_POST['email'],
  $_POST['idade'],
  $_POST['id']
);

if($stmt->execute()){
  header("Location: listar.php?status=sucesso");
} else {
  header("Location: listar.php?status=erro");
}
?>