<?php

use Livro\Control\Page;
use Livro\Widgets\Form\SimpleForm;
class SimpleFormControl extends Page
{
    public function __construct()
    {
        //parent::__construct();

        $form = new SimpleForm("My_form");
        $form->setTitle("Titulo");
        $form->addField("Nome", "nome", "text", "Maria", "form-control");
        $form->addField("Endereço", "endereco", "text", "Rua do Além", "form-control");
        $form->addField("Telefone", "telefone", "text", "(65) 99888-5454", "form-control");
        $form->setAction("index.php?class=SimpleFormControl&method=onGravar");
        $form->show();
    }

    public function onGravar($param)
    {
        echo "<pre>";
        var_dump($param);
        echo "</pre>";
    }
}