<?php

class Pessoa
{
    private $nome;
    private $endereco;
    private $nascimento;
}

$p1 = new Pessoa;
$p1->nome = "Maria da Silva";
$p1->endereco = "Rua Bento Gonçalves";
$p1->nascimento = "01 de Maio de 1985";

echo "<pre>";
var_dump($p1);
echo "</pre>";