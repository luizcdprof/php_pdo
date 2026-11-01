<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'select * from produtos';

echo '<h3>Produtos:</h3>';

foreach($pdo->query($sql) as $key => $value) {
    echo 'ID: ' .
        $value['id_produto'] .
        '<br />Descrição: ' . $value['descricao'] .
        '<br />Qtd: ' . $value['qtd'] .
        '<br />Valor: R$ ' . $value['valor'] .
        '<hr />'
    ;
}