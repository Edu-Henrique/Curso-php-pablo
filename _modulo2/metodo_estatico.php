<?php

class Software
{
    private $id;
    private $nome;
    private static $contador;

    public function __construct($nome)
    {
        self::$contador ++;
        $this->id = self::$contador;
        $this->nome = $nome;
    }

    public static function getContator()
    {
        return self::$contador;
    }
}

$s1 = new Software("Gimp");
$s2 = new Software("Gnumeric");

echo "<pre>";
var_dump($s1, $s2, Software::getContator());
echo "</pre>";