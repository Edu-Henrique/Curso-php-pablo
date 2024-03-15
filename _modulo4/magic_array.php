<?php

class Titulo
{
    private $data;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($propriedade)
    {
        return isset($this->data[$propriedade]);
    }

    public function __unset($propriedade)
    {
        unset($this->data[$propriedade]);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }
}

$tit = new Titulo();
$tit->valor = 100;
$tit->vencimento = date("Y-m-d");
$tit->nome = "Boleto 123";

if(isset($tit->valor)){
    echo "Tem Valor \n";
}

// unset($tit->valor);

// echo $tit->valor . "\n";
// var_dump($tit);
echo $tit;