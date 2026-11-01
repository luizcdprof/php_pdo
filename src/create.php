<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'insert into produtos(descricao, qtd, valor) values(?, ?, ?)';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['descricao']);
$prepare->bindParam(2, $_GET['qtd']);
$prepare->bindParam(3, $_GET['valor']);
$prepare->execute();

echo $prepare->rowCount();