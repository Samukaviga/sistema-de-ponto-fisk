<?php 

require_once('../conexao.php');
require_once('../funcoes/funcoes.php');

session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['id'];
        $data = $_POST["data"];
        $horarioInicio = $_POST["horario-inicio"];
        $horarioFim = $_POST["horario-fim"]; 
        $metodo = $_POST["metodo"];
        $observacao = $_POST["observacao"];
        $unidade = $_POST["unidade"];

    if(empty($data)){
        $_SESSION['mensagem.erro'] = "Data da aula é obrigatório";
        header("Location: ../marcar-horario.php");
        exit();
    }

    if(empty($horarioInicio)) {
        $_SESSION['mensagem.erro'] = 'Horario de inicio é obrigatório';
        header('Location:  ../marcar-horario.php');
        exit();

    } else if(empty($metodo)){
        $_SESSION['mensagem.erro'] = 'Metodo é obrigatório';
        header('Location:  ../marcar-horario.php');
        exit();

    } else if(empty($unidade)){
        $_SESSION['mensagem.erro'] = 'Unidade é obrigatório';
        header('Location:  ../marcar-horario.php');
        exit();
    }
   
    $cadastrado = cadastrarHorario($conexao, $id, $data, $horarioInicio, $horarioFim, $metodo, $observacao, $unidade);

    if($cadastrado) {
        $_SESSION['mensagem.sucesso'] = 'Ponto adicionado com sucesso!';
        header('Location: ../cadastro.php');
        exit();

    } else {
        $_SESSION['mensagem.erro'] = 'Falha ao adicionar ponto';
        header('Location: ../cadastro.php');
        exit();
    }

    

}















