<?php

class Titulo
{
    private $valor;
    private $vencimento;

    public function __construct($valor, $vencimento)
    {
        $this->valor = $valor;
        $this->vencimento = $vencimento;
    }

    public function __toString()
    {
        return "Valor: {$this->valor}, Vencimento: {$this->vencimento}";
    }

}

$titulo = new Titulo(100, date("Y-m-d"));

echo "Titulo: " . $titulo;