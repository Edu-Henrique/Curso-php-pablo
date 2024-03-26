<?php

header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/Lib/Livro/Core/ClassLoader.php";
$al = new Livro\Core\ClassLoader();
$al->addNamespace("Livro", "Lib/Livro");
$al->register();

require_once __DIR__ . "/Lib/Livro/Core/AppLoader.php";
$al2 = new Livro\Core\AppLoader();
$al2->addDirectory("App/Control");
$al2->addDirectory("App/Model");
$al2->addDirectory("App/Services");
$al2->register();

class LivroRestServer
{
    public static function run($request)
    {
        $class = isset($request["class"]) ? $request["class"] : "";
        $method = isset($request["method"]) ? $request["method"] : "";

        try {
            if(class_exists($class)){
                if(method_exists($class, $method)){
                    $response = call_user_func([$class, $method], $request);
                    return json_encode(["status" => "success", "data" => $response]);
                } else{
                    return json_encode(["status" => "error", "data" => "Método {$method} não encontrado"]);
                }
            } else{
                return json_encode(["status" => "error", "data" => "Classe {$class} não encontrada"]);
            }
        } catch (Exception $e){
            //Transaction::rollback();
            return json_encode(["status" => "error", "data" => $e->getMessage()]);
        }
    }
}

echo LivroRestServer::run($_REQUEST);