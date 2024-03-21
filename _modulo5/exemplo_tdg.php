<?php

require_once __DIR__ . "/classes/tdg/ProdutoGateway.php";

try {
    $conn = new PDO("mysql:dbname=estoque;host=localhost;user=root;password=");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ProdutoGateway::setConnection($conn);
    /*
    $data = new stdClass();
    $data->descricao = "Vinho";
    $data->estoque = 8;
    $data->preco_custo = 12;
    $data->preco_venda = 22;
    $data->codigo_barras = "7516541981168";
    $data->data_cadastro = date('Y-m-d');
    $data->origem = "N";

    $gd = new ProdutoGateway();
    $gd->save($data);
    */

    /*
    $gw = new ProdutoGateway();
    $produto = $gw->find(1);
    $produto->estoque += 2;
    $gw->save($produto);
    */

    $gw = new ProdutoGateway();
    foreach ($gw->all() as $produto){
        echo "{$produto->descricao}: {$produto->preco_venda} <br>";
    }

} catch (Exception $e){
    echo $e->getMessage();
}