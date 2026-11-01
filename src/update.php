<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'update produtos set descricao = ? where id_produto = ?';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['descricao']);
$prepare->bindParam(2, $_GET['id_produto']);
$prepare->execute();

echo $prepare->rowCount();