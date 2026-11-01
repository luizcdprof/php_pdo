<?php

require 'src/Produto.php';

$produto = new Produto();

$produto->create('p4', 4, 4.0);
var_dump($produto->read());
$produto->update(4, 'produto4');
var_dump($produto->read());
$produto->delete(4);
var_dump($produto->read());