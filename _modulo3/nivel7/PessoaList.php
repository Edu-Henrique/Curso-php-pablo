<?php

require_once "classes/Pessoa.php";

class PessoaList
{
    private $html;
    public function __construct()
    {
        $this->html = file_get_contents("html/list.html");
    }

    public function delete($param)
    {
        try
        {
            $id = (int) $param["id"];
            Pessoa::delete($id);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function load()
    {
        try
        {
            $items = "";
            $pessoas = Pessoa::all();
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
            $this->html = str_replace("{items}", $items, $this->html);
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show()
    {
        $this->load();
        echo $this->html;
    }
}