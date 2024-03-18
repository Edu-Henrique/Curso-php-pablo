<?php

foreach (new DirectoryIterator(__DIR__) as $file){
    echo (string) $file ."<br>";
    echo "Nome: {$file->getFilename()} <br>";
    echo "Extesão: {$file->getExtension()} <br>";
    echo "tamanho: {$file->getSize()} <br><br>";
}