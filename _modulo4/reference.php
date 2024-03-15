<?php

class Titulo
{
    public $codigo;
    public $dt_vencimento;
    public $valor;
    public $juros;
    public $multa;
}

$titulo = new Titulo();
$titulo->codigo = 1;
$titulo->dt_vencimento = "2018-10-10";
$titulo->valor = 100;
$titulo->juros = 0.1;
$titulo->multa = 1;

$titulo2 = $titulo;
$titulo2->valor = 200;

var_dump($titulo);
var_dump($titulo2);