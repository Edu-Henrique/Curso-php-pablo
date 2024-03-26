<?php

use Livro\Database\Criteria;
use Livro\Database\Repository;
use Livro\Database\Transaction;

class PessoaControl
{
    public function listar()
    {
        try {
            Transaction::open("livro");
            $criteria = new Criteria();
            $criteria->setProperty("order", "id");
            $repository = new Repository("Pessoa");
            $pessoas = $repository->load($criteria);
            if($pessoas){
                foreach ($pessoas as $pessoa) {
                    echo "{$pessoa->id} - {$pessoa->nome} <br>";
                }
            }
            Transaction::close();
        } catch (Exception $e){
            Transaction::rollback();
            echo $e->getMessage();
        }
    }

    public function show($param)
    {
        if(isset($param["method"]) && ($param["method"] == "listar")){
            $this->listar();
        }
    }
}