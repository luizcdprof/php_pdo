<?php

declare(strict_types=1);

class Produto
{
    /**
     * Summary of conn
     * @var PDO
     */
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=php_pdo', 'root', '');
        } catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function create(string $descricao, int $qtd=0, float $valor=0.0): int
    {
        $sql = 'insert into produtos(descricao, qtd, valor) values(?, ?, ?)';

        $prepare = $this->conn->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $qtd);
        $prepare->bindParam(3, $valor);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function read(): array
    {
        $sql = 'select * from produtos';
        
        $produtos = [];

        foreach($this->conn->query($sql) as $key => $value) {
            array_push($produtos, $value);
        }

        return $produtos;
    }

    public function update(int $id_produto, string $descricao): int
    {
        $sql = 'update produtos set descricao = ? where id_produto = ?';

        $prepare = $this->conn->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id_produto);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function delete(int $id_produto): int
    {
        $sql = 'delete from produtos where id_produto = ?';

        $prepare = $this->conn->prepare($sql);

        $prepare->bindParam(1, $id_produto);
        $prepare->execute();

        return $prepare->rowCount();
    }
}