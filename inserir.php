<?php
include 'conexao.php';

// Recebe apenas o nome e títulos que vieram do formulário
$nome = $_POST['nome'];
$titulos = $_POST['titulos'];

// Como a tabela exige a coluna 'time', vamos fixar "Botafogo" por padrão
$time = "Botafogo";

// Monta o SQL para a tabela botafogo
$sql = "INSERT INTO botafogo (time, nome, titulos) VALUES (:time, :nome, :titulos)";

$stmt = $conexao->prepare($sql);

// Faz a ligação dos parâmetros de forma segura
$stmt->bindParam(':time', $time);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':titulos', $titulos);

// Executa e salva no banco
$stmt->execute();

// Redireciona de volta para a tela inicial
header("Location: index.php");
exit;
?>