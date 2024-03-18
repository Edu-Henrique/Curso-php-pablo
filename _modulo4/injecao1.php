<?php

require_once __DIR__ . "/classes/Record.php";

class JSONExport
{
    public function export($data)
    {
        return json_encode($data);
    }
}

class Pessoa extends Record
{
    const TABLENAME = "Pessoa";

    public function toJSON()
    {
        $je = new JSONExport();
        return $je->export($this->data);
    }
}

$p = new Pessoa();
$p->nome     = "Maria";
$p->endereco = "Rua das Dores";
$p->numero   = "123";

echo $p->toJSON();