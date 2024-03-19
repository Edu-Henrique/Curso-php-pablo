<?php

$pessoas = [
    "Joao001" => [
        "codigo" => 001,
        "nome" => "joão",
        "endereco" => "Rua do João"
    ],
    "Ari002" => [
        "codigo" => 002,
        "nome" => "ari",
        "endereco" => "Rua do Ari"
    ],
    "Maria003" => [
        "codigo" => 003,
        "nome" => "maria",
        "endereco" => "Rua da Maria"
    ],
    "Leticia004" => [
        "codigo" => 004,
        "nome" => "leticia",
        "endereco" => "Rua da Leticia"
    ],
    "Gustavo005" => [
        "codigo" => 005,
        "nome" => "gustavo",
        "endereco" => "Rua do Gustavo"
    ]
];

$dom = new DOMDocument("1.0", "UTF-8");
$dom->formatOutput = true;

$xmlPessoas = $dom->createElement("pessoas");

foreach ($pessoas as $pessoa => $atributo){
    $xmlPessoa = $dom->createElement("pessoa");
    $xmlPessoaName = $dom->createElement("nome", $pessoa);
    $xmlAtributo = $dom->createElement("atributo");
    $xmlPessoa->setAttribute("id", $atributo['codigo']);
    $xmlPessoa->appendChild($xmlPessoaName);
    $xmlPessoa->appendChild($xmlAtributo);

    foreach ($atributo as $chave => $valor){
        $xmlValor = $dom->createElement($chave,$valor);
        $xmlAtributo->appendChild($xmlValor);
    }

    $xmlPessoas->appendChild($xmlPessoa);
}

$dom->appendChild($xmlPessoas);
$dom->save("pessoas.xml");
echo $dom->saveXML();