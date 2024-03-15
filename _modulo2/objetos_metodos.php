<?php

class Funcionario
{
    public function setSalario(){}
    public function getSalario(){}
    public function setNome(){}
    public function getNome(){}
}

echo "<pre>";
print_r(get_class_methods("Funcionario"));
echo "</pre>";