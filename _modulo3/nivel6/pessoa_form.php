<?php 
require_once __DIR__ . "/classes/Pessoa.php";
require_once __DIR__ . "/classes/Cidade.php";

$pessoa = [];
$pessoa["id"]         = "";
$pessoa["nome"]       = "";
$pessoa["endereco"]   = "";
$pessoa["bairro"]     = "";
$pessoa["telefone"]   = "";
$pessoa["email"]      = "";
$pessoa["id_cidade"]  = "";
$status    = "";

try
{
    if(!empty($_REQUEST["action"]))
    {    
        if($_REQUEST["action"] == "edit")
        {
            if(!empty($_GET["id"]))
            {
                $id = (int) $_GET["id"];                    
                $pessoa = Pessoa::find($id);
            }
        }
        else if($_REQUEST["action"] == "save")
        {
            $pessoa = $_POST;
            Pessoa::save($pessoa);
            header("location: pessoa_list.php");
        }
    }
} catch (Exception $e)
{
    echo $e->getMessage();
}

// $cidades = lista_combo_cidades($pessoa['id_cidade']);

$cidades = "";
foreach(Cidade::all() as $cidade)
{
    $id = $cidade["id"];
    $nome = $cidade["nome"];
    $check = ($id == $pessoa["id_cidade"]) ? "selected='1'" : "";
    $cidades .= "<option {$check} value='{$id}'>{$nome}</option> \n";
}


$form = file_get_contents("html/form.html");

$form = str_replace("{id}",        $pessoa['id'],        $form);
$form = str_replace("{nome}",      $pessoa['nome'],      $form);
$form = str_replace("{endereco}",  $pessoa['endereco'],  $form);
$form = str_replace("{bairro}",    $pessoa['bairro'],    $form);
$form = str_replace("{telefone}",  $pessoa['telefone'],  $form);
$form = str_replace("{email}",     $pessoa['email'],     $form);
$form = str_replace("{id_cidade}", $pessoa['id_cidade'], $form);
$form = str_replace("{cidades}",   $cidades,             $form);
$form = str_replace("{status}",    $status,              $form);

echo $form;