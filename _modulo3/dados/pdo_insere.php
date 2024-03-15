<?php

try
{
$conn = new PDO("mysql:dbname=poophp;user=root;password=;host=localhost");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (1, 'Érico Verissimo')");
$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (2, 'John Lennon')");
$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (4, 'Ayrton Senna')");
$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (6, 'Cristiano Ronaldo')");
$conn->exec("INSERT INTO famasos (codigo, nome) VALUES (7, 'Mário Quintana')");

$conn = null;
}
catch (PDOException $e)
{
    echo $e->getMessage();
}