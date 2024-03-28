<?php

use Livro\Control\Page;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Container\HBox;

class ExemploBoxControl extends Page
{
    public function __construct()
    {
        parent::__construct();


        $panel1 = new Panel("Panel 1");
        $panel1->style = "margin:10px";
        $panel1->add("Panel 1");

        $panel2 = new Panel("Panel 2");
        $panel2->style = "margin:10px";
        $panel2->add("Panel 2");

        $box = new HBox();
        $box->add($panel1);
        $box->add($panel2);

        parent::add($box);
    }
}