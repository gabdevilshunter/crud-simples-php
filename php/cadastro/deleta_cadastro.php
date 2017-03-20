<?php

    require_once '../conexao.class.php';
    require_once '../crud.class.php';
    
    $inicio = "https://trabalho-final-cpw-gabdevilshunter.c9users.io/index.php";

    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    $crud = new crud('form003_cadastro'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $id = $_GET['id']; //pega id para exclusao caso exista
    $crud->excluir("id = $id"); // exclui o registro com o id que foi passado

    $con->disconnect(); // fecha a conexao

    header($inicio); // redireciona para a listagem
    
?>