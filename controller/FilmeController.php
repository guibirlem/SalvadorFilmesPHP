<?php


require_once("../model/Filme.php");


class FilmeController{
    public function listarFilmes()
    {
        $page  = require('../view/listar.php');

        return $page;

    }
    public function cadastrarFilmes()
{
    $page  = require('../view/cadastrar.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    
        $filme = new Filme(
            $_POST['titulo'],
            $_POST['sinopse'],
            $_POST['diretor'],
            $_POST['ano'] 
        );

        $filme->salvar();
    }

    return $page;
}

}
$paginaPadrao = 'listarFilmes';
$metodo = isset($_GET["metodo"]) ? $_GET["metodo"] : $paginaPadrao;

$filmeController = new FilmeController();

$filmeController->$metodo();











