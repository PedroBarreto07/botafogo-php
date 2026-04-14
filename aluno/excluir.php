<?php
    include '../conexao.php';

    $id = $_GET['id'];
    // Ajustado para DELETAR DA TABELA BOTAFOGO
    $sql = "DELETE FROM botafogo WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: index.php');
    exit;
?>