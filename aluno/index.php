<?php

    include '../sessao.php';
    include '../conexao.php';
    
    $sql = " SELECT * FROM botafogo ";
    $consulta = $conexao->query($sql);

    # Edição
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM botafogo WHERE id = :id";
        $consultaUp = $conexao->prepare($sql);
        $consultaUp->bindParam(':id', $id);
        $consultaUp->execute();
        $aluno = $consultaUp->fetch(PDO::FETCH_OBJ);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Botafogo</title>
</head>
<body>

    <h2>Cadastrar Ídolo</h2>
    <form action="inserir.php" method="POST">
        Nome: <input type="text" name="nome" required>
        Títulos: <input type="number" name="titulos" required>
        <input type="submit" value="Salvar">
    </form>
    
    <br><hr><br>

    <h2>Jogadores do Botafogo</h2>

    <table width="100%" border="1">
        <tr>
            <th>ID</th>
            <th>Time</th>
            <th>Nome</th>
            <th>Títulos</th>
            <th>Excluir</th>
        </tr>

        <?php
        while ($linha = $consulta->fetch(PDO::FETCH_OBJ)){
        ?>
        <tr>
            <td><?php echo $linha->id ?></td>
            <td><?php echo $linha->time ?></td>
            <td><?php echo $linha->nome ?></td>
            <td><?php echo $linha->titulos ?></td>
            <td><a href="excluir.php?id=<?php echo $linha->id ?>">Excluir</a></td>
        </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>

</body>
</html>