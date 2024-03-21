<?php

require_once __DIR__ . "/classes/ar/Produto.php";

try {
    $conn = new PDO("mysql:dbname=estoque;host=localhost;user=root;password=");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    Produto::setConnection($conn);

    foreach (Produto::all() as $produto){
        // $produto->descricao;
        //$produto->delete();
    }

    /*
    $produto = new Produto();
    $produto->descricao = "Chocolate";
    $produto->estoque = 30;
    $produto->preco_custo = 4.99;
    $produto->preco_venda = 11.99;
    $produto->codigo_barras = "7519841416941";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();

    */
    $outro = Produto::find(17);
    echo "Descricao: {$outro->descricao} <br>";
    echo "Lucro: {$outro->getMargemLucro()} <br>";
    $outro->registraCompra(5.49, 15);
    var_dump($outro);
    $outro->save();/**/

} catch (Exception $e){
    echo $e->getMessage();
}