<?php

require 'src/Produto.php';

$produto = new Produto();

// $produto->create();
// $produto->read();
// $produto->update();
$produto->read();
$produto->delete();
$produto->read();