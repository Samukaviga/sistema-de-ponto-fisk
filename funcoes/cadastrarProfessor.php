<?php 

require_once('../conexao.php');
require_once('../funcoes/funcoes.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['id'];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"]; 
    $confirmarSenha = $_POST["confirmar-senha"];
    $valor = $_POST["valor"];

    $buscandoProfessor = buscandoProfessor($email, $conexao);

    if(!empty($buscandoProfessor)){
        $_SESSION['mensagem.erro'] = "Email já existente!";
        header("Location: ../cadastro.php");
        exit();
    }


    if($senha != $confirmarSenha) {
        $_SESSION['mensagem.erro'] = "Senhas precisam ser iguais!";
        header("Location: ../cadastro.php");
        exit();
    }

    if(empty($nome)) {
        $_SESSION['mensagem.erro'] = 'Nome é obrigatório';
        header('Location:  ../cadastro.php');
        exit();

    } else if(empty($email)){
        $_SESSION['mensagem.erro'] = 'Email é obrigatório';
        header('Location:  ../cadastro.php');
        exit();
    }

    $cadastrado = cadastrarProfessor($conexao, $nome, $email, $senha, $valor);

    if($cadastrado) {
        $_SESSION['mensagem.sucesso'] = 'Professor cadastrado com sucesso!';
        header('Location: ../cadastro.php');
        exit();
    } else {
        $_SESSION['mensagem.erro'] = 'Falha ao inserir o professor';
        header('Location: ../cadastro.php');
        exit();
    }

    

}


