<?php

class Titulo
{
    public $codigo;
    public $dt_vencimento;
    public $valor;
    public $juros;
    public $multa;
    
    public function __clone()
    {
        $this->codigo = null;
    }
}

$titulo = new Titulo;
$titulo->codigo = 1;
$titulo->dt_vencimento = "2018-10-10";
$titulo->valor = 100;
$titulo->juros = 0.1;
$titulo->multa = 1;

$titulo2 = clone $titulo;
$titulo2->valor = 200;

var_dump($titulo);
var_dump($titulo2);