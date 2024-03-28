<?php

use Livro\Control\Page;
use Livro\Widgets\Container\Panel;
class ExemploPanelControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        $panel =  new Panel("Título do Painel");
        $panel->style = "margin: 20px";
        $panel->add("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.");
        $panel->addFooter("Rodapé");
        parent::add($panel);
    }
}