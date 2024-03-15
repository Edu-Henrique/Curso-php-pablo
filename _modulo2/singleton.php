<?php

require_once __DIR__ . "/classes/preferencias.php";

// new Preferencias;
$p1 = Preferencias::getInstance();
$p2 = Preferencias::getInstance();

$p1->setData("language", "pt");
$p1->setData("Author", "Eduardo");
$p2->save();
echo "A linguagem é :" . $p1->getData("language") . "<br>";
echo "A linguagem é :" . $p2->getData("language") . "<br>";

echo "<pre>";
var_dump($p1, $p2);
echo "</pre>";