<?php

class Produto
{
    private $descricao;
    private $estoque;
    private $preco;
 

    public function __construct($descricao, $estoque, $preco)
    {
        $this->setDescricao($descricao);
        $this->setEstoque($estoque);
        $this->setPreco($preco);
    }

    public function __destruct()
    {
        echo "<p>Destruído: Objeto {$this->getDescricao()}</p>";
    }

    public function setDescricao($descricao)
    {
        if(is_string($descricao))
        {
            $this->descricao = $descricao;
        }
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setEstoque($estoque)
    {
        if(is_numeric($estoque) and $estoque >= 0)
        {
            $this->estoque = $estoque;
        }
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setPreco($preco)
    {
        if(is_numeric($preco) and $preco > 0)
        {
            $this->preco = $preco;
        }
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function aumentarEstoque($unidades)
    {
        if(is_numeric($unidades) and $unidades >= 0)
        {
            $this->estoque += $unidades;
        }
    }

    public function diminuirEstoque($unidades)
    {
        if(is_numeric($unidades) and $unidades >=0)
        {
            $this->estoque -= $unidades;
        }
    }

    public function reajustarPreco($percentual){
        if(is_numeric($percentual) and $percentual >= 0)
        {
            $this->preco += ($percentual / 100) * $this->preco;
        }
    }
}

$p1 = new Produto("Chocolate", 8, 5);
$p2 = new Produto("Café", 5, 12);
// $p1->setDescricao("Chocolate");
// $p1->setEstoque(8);
// $p1->setPreco(5);

echo "<p>O estoque de {$p1->getDescricao()} é {$p1->getEstoque()}</p>";
echo "<p>O preço de {$p1->getDescricao()} é {$p1->getPreco()}</p>";

$p1->aumentarEstoque(10);
$p1->diminuirEstoque(5);
$p1->reajustarPreco(30);

echo "<p>O estoque de {$p1->getDescricao()} é {$p1->getEstoque()}</p>";
echo "<p>O preço de {$p1->getDescricao()} é {$p1->getPreco()}</p>";

echo "<pre>";
var_dump($p1);

unset($p1);
unset($p2);