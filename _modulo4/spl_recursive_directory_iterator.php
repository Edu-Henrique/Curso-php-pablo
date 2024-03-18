<?php

$path = __DIR__;

foreach (new RecursiveIteratorIterator( new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)) as $item){
    echo (string) "{$item} . <br>";
}