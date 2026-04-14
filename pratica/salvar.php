<?php
$conn = new mysqli("localhost","root","","trabalho_banco_dados");

if($conn->connect_error){
 header("Location: index.php?status=erro");
 exit;
}

$stmt = $conn->prepare("INSERT INTO usuarios (nome,email,idade) VALUES (?,?,?)");

if($stmt){
 $stmt->bind_param("ssi", $_POST['nome'], $_POST['email'], $_POST['idade']);

 if($stmt->execute()){
   header("Location: index.php?status=sucesso");
 } else {
   header("Location: index.php?status=erro");
 }
} else {
 header("Location: index.php?status=erro");
}
?>