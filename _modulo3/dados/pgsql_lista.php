<?php

//Conexão de banco de dado postgress

$conn = pg_connect("host=localhost port=5432 dbname=livro user=postgress password=");

$query = "SELECT * FROM famosos";

$result = pg_query($conn, $query);

if($result)
{
    while($row = pg_fetch_assoc($result))
    {
        echo $row['codigo'] . " - " . $row['nome'] . "<br>";
    }
    
}

echo "<pre>";
var_dump($row);
echo "</pre>";

pg_close($conn);