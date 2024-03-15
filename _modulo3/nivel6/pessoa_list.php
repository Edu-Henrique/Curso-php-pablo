<?php
require_once __DIR__ . "/classes/Pessoa.php";


try
{
    if(!empty($_GET["action"]) and $_GET["action"] == "delete")
    {
        $id = (int) $_GET["id"];                        
        Pessoa::delete($id);
    }

    $pessoas = Pessoa::all();
} catch (Exception $e)
{
    echo $e->getMessage();
}

$items = "";
if($pessoas){
    foreach($pessoas as $pessoa)
    { 
        $item = file_get_contents("html/item.html");
        $item = str_replace("{id}",        $pessoa[0], $item);
        $item = str_replace("{nome}",      $pessoa[1], $item);
        $item = str_replace("{endereco}",  $pessoa[2], $item);
        $item = str_replace("{bairro}",    $pessoa[3], $item);
        $item = str_replace("{telefone}",  $pessoa[4], $item);
        $item = str_replace("{email}",     $pessoa[5], $item);
        $item = str_replace("{id_cidade}", $pessoa[6], $item);

        $items .= $item;
    }
}

$list = file_get_contents("html/list.html");
$list = str_replace("{items}", $items, $list);

echo $list;