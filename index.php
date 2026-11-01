<?php

require 'src/Produto.php';

$produto = new Produto();

switch($_GET['oper']) {
    case 'insert':
        $status = $produto->create('Produto de teste', 1);
        
        if(!$status) {
            echo 'Não foi possível criar um produto...';
        } else {
            echo ' produto criado com sucesso!';
        }

        break;
    case 'list':
        echo '<h1>Lista de Produtos</h1>';
        foreach($produto->read() as $value) {
            echo
            '<strong>ID:</strong> ' . $value['id_produto'] . '<br />' .
            '<strong>Descrição:</strong> ' . $value['descricao'] . '<br />' .
            '<strong>Qtd.:</strong> ' . $value['qtd'] . '<br />' .
            '<strong>Valor:</strong> R$ ' . $value['valor'] .
            '<hr />';
        }
        break;
    case 'update':
        $status = $produto->update(1, 'Produto atualizado');
        
        if(!$status) {
            echo 'Não foi possível atualizar o produto...';
        } else {
            echo ' produto atualizado com sucesso!';
        }
        break;
    case 'delete':
        $status = $produto->delete(8);
        
        if(!$status) {
            echo 'Não foi possível remover o produto...';
        } else {
            echo ' produto removido com sucesso!';
        }
        break;
    default:
        echo 'operação inválida...';
        break;
}