<?php

class Record
{
    protected $data;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function save()
    {
        return "INSERT INTO ". $this::TABLENAME . "(`"
            . implode("`, `", array_keys($this->data)) . "`) VALUES " .
            "('" . implode("', '",array_values($this->data)) . "')";
    }

    public function delete($id)
    {
        return "DELETE FROM ". $this::TABLENAME . " WHERE ID = {$id}";
    }

    public function load($id)
    {
        return "SELECT * FROM " . $this::TABLENAME . " WHERE ID = {$id}";
    }
}