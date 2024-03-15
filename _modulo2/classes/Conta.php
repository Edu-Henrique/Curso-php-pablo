<?php

abstract class Conta
{
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($agencia, $conta, $saldo)
    {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = ($saldo > 0) ? $saldo : 0;
    }

    public function depositar($quantia)
    {
        if($quantia > 0){
            $this->saldo += $quantia;
        }
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getInfo()
    {
        return "Agencia: {$this->agencia}, Conta: {$this->conta}";
    }

    abstract function retirar($quantia);
}