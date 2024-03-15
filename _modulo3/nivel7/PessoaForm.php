<?php
require_once __DIR__ . "/classes/Pessoa.php";
require_once __DIR__ . "/classes/Cidade.php";

class PessoaForm
{
    private $html;
    private $data;

    public function __construct($param = null)
    {        
        $this->html = file_get_contents("html/form.html");
        $this->data = [
            "id"        => null,
            "nome"      => null,
            "endereco"  => null,
            "bairro"    => null,
            "telefone"  => null,
            "email"     => null,
            "id_cidade" => null
        ];

        if(!empty($param["id"])){
            $pessoa = Pessoa::find($param["id"]);
            $id_cidade = $pessoa["id_cidade"];
        }

        $cidades = "";
        foreach(Cidade::all() as $cidade)
        {
            $id = $cidade["id"];
            $nome = $cidade["nome"];
            if(!empty($id_cidade))
            {
                $check = ($id == $id_cidade) ? "selected='1'" : "";
            } else
            {
                $check = "";
            }
            $cidades .= "<option {$check} value='{$id}'>{$nome}</option> \n";
        }
        $this->html = str_replace("{cidades}", $cidades, $this->html);
    }

    public function edit($param)
    {
        try
        {
            $id = (int) $param["id"];
            $this->data = Pessoa::find($id);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function save($param)
    {
        try
        {
            Pessoa::save($param);
            $this->data = $param;
            echo "Salvo com Sucesso!!!";
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }        
    }

    public function show()
    {
        $this->html = str_replace("{id}",        $this->data["id"],        $this->html);
        $this->html = str_replace("{nome}",      $this->data["nome"],      $this->html);
        $this->html = str_replace("{endereco}",  $this->data["endereco"],  $this->html);
        $this->html = str_replace("{bairro}",    $this->data["bairro"],    $this->html);
        $this->html = str_replace("{telefone}",  $this->data["telefone"],  $this->html);
        $this->html = str_replace("{email}",     $this->data["email"],     $this->html);
        $this->html = str_replace("{id_cidade}", $this->data["id_cidade"], $this->html);
        echo $this->html;
    }
}