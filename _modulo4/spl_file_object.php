<?php

$file = new SplFileObject("spl_file_object.php");
echo "Nome: {$file->getFilename()} <br>";
echo "Extensão: {$file->getExtension()} <br>";

$file2 = new SplFileObject("novo.txt", "w");

$bytes = $file2->fwrite("Olá Mundo PHP");

echo "Bytes: " . $bytes;