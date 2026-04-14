<?php
$conn = new mysqli("localhost","root","","trabalho_banco_dados");

if($conn->connect_error){
  die("Erro de conexão");
}

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
  $stmt->bind_param("i", $id);

  if($stmt->execute()){
    header("Location: listar.php?status=sucesso");
  } else {
    header("Location: listar.php?status=erro");
  }
}
?>