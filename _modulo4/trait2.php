<?php

require_once __DIR__ . "/classes/Record.php";

class Produto extends Record
{
    const TABLENAME = "produto";
    use ObjectConversionTrait;
}
trait ObjectConversionTrait
{
    public function toXML()
    {
        $xml = new SimpleXMLElement("<" . get_class($this) . "/>");
        foreach ($this->data as $key => $value){
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }

    public function toJSON()
    {
        return json_encode($this->data);
    }
}

$produto = new Produto();
$produto->name = "Chocolate";
$produto->preco = 12.99;
$produto->qtde = 2;

echo $produto->load(10) . "<br>";
echo $produto->delete(10). "<br>";
echo $produto->save(). "<br>";

echo "<pre>";
echo $produto->toJSON();
echo $produto->toXML();