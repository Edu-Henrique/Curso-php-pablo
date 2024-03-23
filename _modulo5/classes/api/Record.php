<?php

abstract class Record
{
    protected $data;

    public function __construct($id = null)
    {
        if($id){
            $object = $this->load($id);
            if ($object){
                $this->fromArray($object->toArray());
            }
        }
    }

    public function __set($name, $value)
    {
        if($value === null){
            unset($this->data[$name]);
        } else{
            $this->data[$name] = $value;
        }
    }

    public function __get($name)
    {
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __clone()
    {
        unset($this->data["id"]);
    }

    public function fromArray($data)
    {
        $this->data = $data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function getEntity()
    {
        $class = get_class($this);
        return constant("{$class}::TABLENAME");
    }

    public function load($id)
    {
        $sql = "SELECT * FROM {$this->getEntity()} WHERE ID = ". (int) $id;

        if($conn = Transaction::get()){
            Transaction::log($sql);
            $result = $conn->query($sql);
            if($result){
                return $result->fetchObject(get_class($this));
            }
        } else{
            throw new Exception("Não há transação ativa");
        }
    }

    public function store()
    {
        if((empty($this->data["id"])) || (!$this->load($this->data["id"]))){
            $this->data["id"] = "DEFAULT";
            $prepared = $this->prepare($this->data);
            $prepared["id"] = $this->data["id"];

            $sql = "INSERT INTO {$this->getEntity()} " .
                    "(" . implode(", ", array_keys($this->data)) . ")" .
                    " VALUES " .
                    "('" . implode("', '", array_values($this->data)) . "')";
        } else{
            $prepared = $this->prepare($this->data);
            $set = [];
            foreach ($prepared as $column => $value){
                $set[] = "{$column} = {$value}";
            }

            $sql = "UPDATE {$this->getEntity()} ";
            $sql .= " SET ". implode(", ",$set);
            $sql .= " WHERE ID = " . (int) $this->data['id'];
        }

        if($conn = Transaction::get()){
            Transaction::log($sql);
            return $conn->exec($sql);
        } else{
            throw new Exception("Não há transação ativa");
        }
    }

    public function delete($id = null)
    {
        $id = $id ? $id : $this->data["id"];

        $sql = "DELETE FROM {$this->getEntity()} WHERE ID = " . (int) $id;

        if($conn = Transaction::get()){
            Transaction::log($sql);
            return $conn->exec($sql);
        } else{
            throw new Exception("Não há transação ativa")
        }
    }

    public function getLast()
    {
        $sql = "SELECT max(ID) FROM {$this->getEntity()}";

        if($conn = Transaction::get()) {
            Transaction::log($sql);
            $result = $conn->query($sql);
            $row = $result->fetch();
            return $row[0];
        } else{
            throw new Exception("Não há transação ativa");
        }
    }

    public function prepare($data)
    {
        $prepared = array();
        foreach ($data as $key => $value){
            if(is_scalar($value)){
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }

    public function escape($value)
    {
        if(is_string($value) && (!empty($value))){
            $value = Addslashes($value);
            return "'$value'";
        } else if (is_bool($value)){
            return $value ? "TRUE" : "FALSE";
        } else if($value !== ""){
            return  $value;
        } else{
            return "NULL";
        }
    }
}