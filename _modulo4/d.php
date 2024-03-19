<?php

require_once __DIR__ . "/a.php";
require_once __DIR__ . "/b.php";

use Application\Form as Form;
use Application\Field as Field;
use Components\Form as ComponentForm;
use Components\Field as ComponentField;

var_dump(new \Application\Form());
echo "<br>";
var_dump(new \Components\Form());
echo "<br>";

var_dump(new Form());
echo "<br>";
var_dump(new Field());
echo "<br>";

var_dump(new ComponentForm());
echo "<br>";
var_dump(new ComponentField());
echo "<br>";