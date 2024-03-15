<?php 
require_once __DIR__ . "/lista_combo_cidades.php";

$pessoa = [];
$pessoa["id"]         = "";
$pessoa["nome"]       = "";
$pessoa["endereco"]   = "";
$pessoa["bairro"]     = "";
$pessoa["telefone"]   = "";
$pessoa["email"]      = "";
$pessoa["id_cidade"]  = "";
$status    = "";

if(!empty($_REQUEST["action"]))
{
    $conn = mysqli_connect("localhost","root", "", "poophp");
    if($_REQUEST["action"] == "edit")
    {
        if(!empty($_GET["id"]))
        {
            $id = (int) $_GET["id"];                    
            $query = "SELECT * FROM PESSOA WHERE ID = {$id}";
            $result = mysqli_query($conn, $query);
            $pessoa = mysqli_fetch_assoc($result);
        }
    }
    else if($_REQUEST["action"] == "save")
    {
        $pessoa = $_POST;
        if(empty($_POST["id"]))
        {
            $sql = "INSERT INTO PESSOA (ID, NOME, ENDERECO, BAIRRO, TELEFONE, EMAIL, ID_CIDADE)
                    VALUES (DEFAULT, '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', {$pessoa['id_cidade']})";            
            mysqli_query($conn, $sql);
            $status = "Cadastrado com sucesso!!!";
            header("location: pessoa_list.php");
        }
        else{
            $sql = "UPDATE PESSOA SET NOME      = '{$pessoa['nome']}',
                                      ENDERECO  = '{$pessoa['endereco']}',
                                      BAIRRO    = '{$pessoa['bairro']}',
                                      TELEFONE  = '{$pessoa['telefone']}',
                                      EMAIL     = '{$pessoa['email']}',
                                      ID_CIDADE = {$pessoa['id_cidade']} WHERE ID = {$pessoa['id']}";
            $result = mysqli_query($conn, $sql);

            $status = ($result) ? "Resgistro alterado com sucesso!!!" : "Erro na tentadiva de alteração";
            header("location: pessoa_list.php");
        }

    }
    mysqli_close($conn);
}

$cidades = lista_combo_cidades($pessoa['id_cidade']);


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