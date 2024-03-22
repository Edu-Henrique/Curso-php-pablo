<?php

class ProdutoComTransacaoELog
{
    private $data;

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM PRODUTO WHERE ID = '{$id}'";
        $conn = Transaction::get();
        $result = $conn->query($sql);
        Transaction::log($sql);
        return $result->fetchObject(__CLASS__);
    }

    public static function all($filter = "")
    {
        $sql = "SELECT * FROM PRODUTO ";
        if ($filter) {
            $sql .= " WHERE {$filter}";
        }

        $conn = Transaction::get();
        $result = $conn->query($sql);
        Transaction::log($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function delete()
    {
        $sql = "DELETE FROM PRODUTO WHERE ID = {$this->id}";
        $conn = Transaction::get();
        $result = $conn->query($sql);
        Transaction::log($sql);
        return $result;
    }

    public function save()
    {
        if (empty($this->data["id"])) {
            $sql = "INSERT INTO PRODUTO (ID, DESCRICAO, ESTOQUE, PRECO_CUSTO, PRECO_VENDA, CODIGO_BARRAS, DATA_CADASTRO, ORIGEM)
                    VALUES (DEFAULT, '{$this->descricao}', '{$this->estoque}', '{$this->preco_custo}', '{$this->preco_venda}',
                            '{$this->codigo_barras}', '{$this->data_cadastro}', '{$this->origem}')";
        } else {
            $sql = "UPDATE PRODUTO SET DESCRICAO     = '{$this->descricao}',
                                       ESTOQUE       = '{$this->estoque}',
                                       PRECO_CUSTO   = '{$this->preco_custo}',
                                       PRECO_VENDA   = '{$this->preco_venda}',
                                       CODIGO_BARRAS = '{$this->codigo_barras}',
                                       DATA_CADASTRO = '{$this->data_cadastro}',
                                       ORIGEM        = '{$this->origem}' WHERE ID = '{$this->id}'";
        }

        $conn = Transaction::get();
        $result = $conn->exec($sql);
        Transaction::log($sql);
        return $result;
    }

    public function getMargemLucro()
    {
        return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }

    public function registraCompra($custo, $quantidade)
    {
        $this->preco_custo = $custo;
        $this->estoque += $quantidade;
    }
}