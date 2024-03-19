<?php

require_once __DIR__ . "/a1.php";
require_once __DIR__ . "/b1.php";
require_once __DIR__ . "/c1.php";

use \Library\Widgets\Field;
use \Library\Container\Table;
use \Library\Widgets\Form;

var_dump(new Field());
echo "<br>";
var_dump(new Table());
echo "<br>";
var_dump(new Form());
echo "<br>";

$f = new Form();
$f->show();
$f->fazAlgo(new Field());