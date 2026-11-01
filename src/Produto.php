<?php

declare(strict_types=1);

class Produto
{
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=php_pdo', 'root', '');
        } catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function create(): int
    {
        $sql = 'insert into produtos(descricao, qtd, valor) values(?, ?, ?)';

        $prepare = $this->conn->prepare($sql);

        $prepare->bindParam(1, $_GET['descricao']);
        $prepare->bindParam(2, $_GET['qtd']);
        $prepare->bindParam(3, $_GET['valor']);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function read(): void
    {
        $sql = 'select * from produtos';

        echo '<h3>Produtos:</h3>';

        foreach($this->conn->query($sql) as $key => $value) {
            echo 'ID: ' .
                $value['id_produto'] .
                '<br />Descrição: ' . $value['descricao'] .
                '<br />Qtd: ' . $value['qtd'] .
                '<br />Valor: R$ ' . $value['valor'] .
                '<hr />'
            ;
        }
    }

    public function update(): int
    {
        $sql = 'update produtos set descricao = ? where id_produto = ?';

        $prepare = $this->conn->prepare($sql);

        $prepare->bindParam(1, $_GET['descricao']);
        $prepare->bindParam(2, $_GET['id_produto']);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function delete(): int
    {
        $sql = 'delete from produtos where id_produto = ?';

        $prepare = $this->conn->prepare($sql);

        $prepare->bindParam(1, $_GET['id_produto']);
        $prepare->execute();

        return $prepare->rowCount();
    }
}