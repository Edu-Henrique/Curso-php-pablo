<?php

class Veiculo
{
    protected $ano;
    protected $cor;
    protected $marca;
    protected $parts;

    /**
     * @return mixed
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
}

class Automovel extends Veiculo
{
    private $placa;
    const RODAS = 4;

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }
}