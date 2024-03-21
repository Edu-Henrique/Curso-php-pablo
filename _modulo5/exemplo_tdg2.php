<?php

require_once __DIR__ . "/classes/tdg/ProdutoGateway.php";
require_once __DIR__ ."/classes/tdg/Produto.php";

try {
    $conn = new PDO("mysql:dbname=estoque;host=localhost;user=root;password=");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    Produto::setConnection($conn);

    $produtos = Produto::all();

    foreach ($produtos as $produto){
        $produto->delete();
    }

    $produto = new Produto();
    $produto->descricao = "Vinho";
    $produto->estoque = 10;
    $produto->preco_custo = 12;
    $produto->preco_venda = 22;
    $produto->codigo_barras = "7216587132486";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();

    $outro = Produto::find(5);
    echo "Descrição {$outro->descricao} <br>";
    echo "Magem de Lucro: {$outro->getMargemLucro()} <br>";
    $outro->registraCompra(14, 5);
    $outro->save();

} catch (Exception $e){
    echo $e->getMessage();
}