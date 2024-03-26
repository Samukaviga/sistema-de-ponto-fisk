<?php

require_once('../conexao.php');
require_once('./funcoes.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['id'];
    $titular = $_POST["titular"];
    $parentesco = $_POST["parentesco"];
    $nomeTitular = $_POST["nome"];
    $cpfTitular = $_POST["cpf"];
    $tipoConta = $_POST["tipo_conta"];
    $nomeBanco = $_POST["nome-banco"];
    $agencia = $_POST["agencia"];
    $conta = $_POST["conta"];
    $tipoPix = $_POST["tipo_pix"];
    $pix = $_POST["pix"];

 

     $banco = buscandoBanco($id, $conexao);

    if($banco){

        $sql = "UPDATE banco SET banco = :banco, conta = :conta, cpf = :cpf, tipo_conta = :tipo_conta, pix = :pix, tipo_pix = :tipo_pix, parentesco = :parentesco, titular = :titular, nome_titular = :nome_titular, agencia = :agencia WHERE usuario_id = :id"; 
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':banco', $nomeBanco, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpfTitular, PDO::PARAM_STR);
        $stmt->bindParam(':agencia', $agencia, PDO::PARAM_STR);
        $stmt->bindParam(':nome_titular', $nomeTitular, PDO::PARAM_STR);
        $stmt->bindParam(':conta', $conta, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_conta', $tipoConta, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_pix', $tipoPix, PDO::PARAM_STR);
        $stmt->bindParam(':pix', $pix, PDO::PARAM_STR);
        $stmt->bindParam(':parentesco', $parentesco, PDO::PARAM_STR);
        $stmt->bindParam(':titular', $titular, PDO::PARAM_INT);
        
        if($stmt->execute()) {
            $_SESSION['mensagem.sucesso'] = 'Dados atualizados com sucesso';
            header('Location: ../dados-bancarios-add.php');
            exit();
        } else {
            $_SESSION['mensagem.erro'] = 'Falha ao atualizar';
            header('Location: ../dados-bancarios-add.php');
            exit();
        }

    } else {

        $sql = "INSERT INTO banco (cpf, banco, conta, tipo_conta, pix, tipo_pix, parentesco, titular, nome_titular ,usuario_id, agencia) VALUES (:cpf, :banco, :conta, :tipo_conta, :pix, :tipo_pix, :parentesco, :titular, :nome_titular, :id, :agencia)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':banco', $nomeBanco, PDO::PARAM_STR);
        $stmt->bindParam(':agencia', $agencia, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpfTitular, PDO::PARAM_STR);
        $stmt->bindParam(':nome_titular', $nomeTitular, PDO::PARAM_STR);
        $stmt->bindParam(':conta', $conta, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_conta', $tipoConta, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_pix', $tipoPix, PDO::PARAM_STR);
        $stmt->bindParam(':pix', $pix, PDO::PARAM_STR);
        $stmt->bindParam(':parentesco', $parentesco, PDO::PARAM_STR);
        $stmt->bindParam(':titular', $titular, PDO::PARAM_INT);
        
        if($stmt->execute()) {
            $_SESSION['mensagem.sucesso'] = 'Dados adicionados com sucesso';
            header('Location: ../dados-bancarios-add.php');
            exit();
        } else {
            $_SESSION['mensagem.erro'] = 'Falha ao inserir';
            header('Location: ../dados-bancarios-add.php');
            exit();
        }
    }

    

}