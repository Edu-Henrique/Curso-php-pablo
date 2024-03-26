<?php

$location = "http://localhost/PHP%20Design%20Patterns/Curso-php-pablo/_modulo6/rest.php";

$parameters = [];
$parameters["class"] = "PessoaServices";
$parameters["method"] = "getData";
$parameters["id"] = "1";

$url = $location . "?" . http_build_query($parameters);

var_dump(json_decode(file_get_contents($url)));