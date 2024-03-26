<?php
require_once('../conexao.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['id'];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $whatsapp = $_POST["whatsapp"];
    $nascimento = $_POST["nascimento"];
    $cpf = $_POST["cpf"];


    if(empty($nome)) {
        $_SESSION['mensagem.erro'] = 'Nome é obrigatório';
        header('Location:  ../meus-dados.php');
        exit();

    } else if(empty($email)){
        $_SESSION['mensagem.erro'] = 'Email é obrigatório';
        header('Location:  ../meus-dados.php');
        exit();
    }

    $sql = "UPDATE usuario SET nome = :nome, email = :email, celular = :celular, nascimento = :nascimento, cpf = :cpf WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':celular', $whatsapp, PDO::PARAM_STR);
    $stmt->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    
    if($stmt->execute()) {
        $_SESSION['mensagem.sucesso'] = 'Dados atualizado com sucesso';
        header('Location: ../meus-dados.php');
        exit();
    } else {
        $_SESSION['mensagem.erro'] = 'Falha ao inserir';
        header('Location: ../meus-dados.php');
        exit();
    }

    

}