<?php

class Titulo
{
    private $dt_vencimento;
    private $valor;

    public function __construct($dt_vencimento, $valor)
    {
        $this->dt_vencimento = $dt_vencimento;
        $this->valor = $valor;
        echo "Método contrutor... <br> \n";
    }

    public function __get($propriedade)
    {
        if($propriedade == "valor"){
            return $this->$propriedade * 1.2 . "<br> \n";
        }
        echo "Tentou acessar a propriedade {$propriedade} <br> \n";
    }

    public function __set($propriedade, $valor)
    {
        if($propriedade = "valor"){
            $this->$propriedade = $valor * 1.5;
        }
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function __destruct()
    {
        echo "Método destrutor... <br> \n";
    }
}

$tit = new Titulo("2024-07-10", 300);
$tit->setValor(100);

echo $tit->valor;
echo $tit->teste;

$tit->valor = "200";

var_dump($tit);
echo $tit->valor;

unset($tit);