<?php

require_once __DIR__ . "/classes/Record.php";

interface ExporterInterface
{
    public function export($data);
}

class JSONExport implements ExporterInterface
{
    public function export($data)
    {
        return json_encode($data);
    }
}

class Pessoa extends Record
{
    const TABLENAME = "Pessoa";

    public function export(ExporterInterface $exporter)
    {
        return $exporter->export($this->data);
    }
}

$p = new Pessoa();
$p->nome     = "Maria";
$p->endereco = "Rua das Dores";
$p->numero   = "123";

echo $p->export(new JSONExport());