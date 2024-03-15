<?php

try
{
$conn = new PDO("mysql:dbname=poophp;user=root;password=;host=localhost");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = $conn->query("SELECT * FROM famasos");

if($result)
{
    foreach($result as $row)
    {
        echo $row['codigo'] . " - " . $row['nome'] . "<br>";
    }
}

echo "<pre>";
var_dump($result);
echo "</pre>";

$conn = null;
}
catch (PDOException $e)
{
    echo $e->getMessage();
}