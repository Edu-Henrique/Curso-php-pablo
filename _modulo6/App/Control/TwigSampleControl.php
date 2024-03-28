<?php

use Livro\Control\Page;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
class TwigSampleControl extends Page
{
    public function __construct()
    {
        $loader   = new FilesystemLoader( "App/Resources");
        $twig     = new Environment($loader);
        $template = $twig->load("form.html");

        $replaces = [];
        $replaces["title"] = "Titulo do Form";
        $replaces["action"] = "index.php?class=TwigSampleControl&method=onGravar";
        $replaces["nome"] = "Maria";
        $replaces["endereco"] = "Rua do Além";
        $replaces["telefone"] = "(51) 1234-5678";

        echo $template->render($replaces);
    }

    public function onGravar($params)
    {
        echo "<pre>";
        var_dump($params);
        echo "</pre>";
    }
}