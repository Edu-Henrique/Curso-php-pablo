<?php

class Software
{
    private $id;
    private $nome;
    public static $contador;

    public function __construct($nome)
    {
        self::$contador ++;
        $this->id = self::$contador;
        $this->nome = $nome;
    }
}

$s1 = new Software("Gimp");
$s2 = new Software("Gnumeric");

echo "<pre>";
var_dump($s1, $s2, Software::$contador);
echo "</pre>";