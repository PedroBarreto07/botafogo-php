<?php
include '../conexao.php';

// Recebe os dados do formulário
$nome = $_POST['nome'];
$titulos = $_POST['titulos'];

// ID (vem pela URL quando for edição)
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Valor padrão
$time = "Botafogo";

if ($id) {
    // UPDATE
    $sql = "UPDATE botafogo 
            SET nome = :nome, titulos = :titulos 
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);

} else {
    // INSERT
    $sql = "INSERT INTO botafogo (time, nome, titulos) 
            VALUES (:time, :nome, :titulos)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':time', $time);
}

// Parâmetros comuns
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':titulos', $titulos);

// Executa
$stmt->execute();

// Redireciona
header("Location:index.php");
exit;
?>