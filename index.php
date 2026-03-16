<?php

include 'conexao.php';

$sql = "select * from botafogo";
$consulta = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Botafogo</title>
</head>

<body>

<h2>Jogadores do Botafogo</h2>

<table width="100%" border="1">

<tr>
<th>ID</th>
<th>Time</th>
<th>Nome</th>
<th>Títulos</th>
</tr>

<?php
while ($linha = $consulta->fetch(PDO::FETCH_OBJ)){
?>

<tr>
<td><?php echo $linha->id ?></td>
<td><?php echo $linha->time ?></td>
<td><?php echo $linha->nome ?></td>
<td><?php echo $linha->titulos ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>