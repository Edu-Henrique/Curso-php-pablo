<?php

//Conexão de banco de dado postgress

$conn = pg_connect("host=localhost port=5432 dbname=livro user=postgress password=");

pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (1, 'Érico Verissimo')");
pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (2, 'John Lennon')");
pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (4, 'Ayrton Senna')");
pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (6, 'Cristiano Ronaldo')");
pg_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (7, 'Mário Quintana')");

pg_close($conn);