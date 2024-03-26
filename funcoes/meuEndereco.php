<?php
require_once('../conexao.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['id'];
    $cep = $_POST["cep"];
    $endereco = $_POST["rua"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["uf"];

    $sql = "UPDATE usuario SET cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':cep', $cep, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
    $stmt->bindParam(':complemento', $complemento, PDO::PARAM_STR);
    $stmt->bindParam(':bairro', $bairro, PDO::PARAM_STR);
    $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);   
    
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