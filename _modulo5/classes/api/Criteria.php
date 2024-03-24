<?php

class Criteria
{

    private $filters;
    private $properties;
    public function __construct()
    {
        $this->filters = [];
        $this->properties = [];
    }

    public function add($variable, $compare, $value, $logic_op = "and")
    {
        if(empty($this->filters)){
            $logic_op = null;
        }
        $this->filters[] = [$variable, $compare, $this->transform($value), $logic_op];
    }

    public function transform($value)
    {
        if(is_array($value)){
            foreach ($value as $item){
                if(is_numeric($item)){
                    $foo[] = $item;
                } elseif (is_string($item)){
                    $foo[] = "'{$item}'";
                }
                $result = "(" . implode(", ", $foo) . ")";
            }
        } elseif (is_string($value)){
            $result = "'{$value}'";
        } elseif(is_null($value)){
            $result = "NULL";
        } elseif(is_bool($value)){
            $result = $value ? "TRUE" : "FALSE";
        } else{
            $result = $value;
        }
        // retorna o valor
        return $result;
    }
    public function dump()
    {
        if(is_array($this->filters) && count($this->filters) > 0){
            $result = "";
            foreach ($this->filters as $filter){
                $result .= $filter[3] . " " . $filter[0] . " " . $filter[1] . " " . $filter[2] . " ";
            }
            $result = trim($result);
            return "({$result})";
        }
    }

    public function setProperty($property, $value)
    {
        $this->properties[$property] = $value;
    }

    public function getProperty($property)
    {
        if(isset($this->properties[$property])){
            return $this->properties[$property];
        }
    }
}