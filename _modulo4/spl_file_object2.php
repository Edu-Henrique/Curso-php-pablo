<?php

$file = new SplFileObject("arquivo.txt");

echo "<pre>";

while(!$file->eof()){
    echo $file->fgets();
}
echo "</pre>";

foreach ($file as $linha => $conteudo){
    echo "{$linha}: {$conteudo} <br>";
}

