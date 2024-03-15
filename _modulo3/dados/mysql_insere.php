<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "poophp");

mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (1, 'Érico Verissimo')");
mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (2, 'John Lennon')");
mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (4, 'Ayrton Senna')");
mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (6, 'Cristiano Ronaldo')");
mysqli_query($conn, "INSERT INTO famasos (codigo, nome) VALUES (7, 'Mário Quintana')");

mysqli_close($conn);