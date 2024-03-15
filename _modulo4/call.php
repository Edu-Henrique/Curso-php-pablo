<?php

class Titulo
{
    public $codigo;
    public $dt_vencimento;
    public $valor;
    public $juros;
    public $multa;
    

    public function __call($method, $values)
    {
        // echo "Você executou o método {$method}, com: ". implode(",", $values);
        return call_user_func($method, get_object_vars($this));
    }
}

$titulo = new Titulo;
$titulo->codigo = 1;
$titulo->dt_vencimento = "2018-10-10";
$titulo->valor = 100;
$titulo->juros = 0.1;
$titulo->multa = 2;

$titulo->print_r(1,2,3);
echo $titulo->count() . "\n";
echo $titulo->json_encode();
