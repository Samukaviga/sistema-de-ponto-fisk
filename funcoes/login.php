<?php 
require_once('../conexao.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $senha = $_POST["senha"];
    $email = $_POST["email"];

    $sql = "select * from usuario where email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetchAll();


    $hash_fornecido = sha1($senha);

    $hash_banco = $usuario[0]['senha'];

    
    

    if(($usuario[0]['email'] != $email) || ($hash_fornecido != $hash_banco)) {

        session_start();

         $_SESSION['mensagem.erro'] = 'Email ou senha incorretos';
         header('Location: ../login.php');

    } else {

        session_start();

        $_SESSION['login'] = true;
        $_SESSION['nome'] = $usuario[0]['nome'];
        $_SESSION['id'] = $usuario[0]['id'];
        $_SESSION['tipo'] = $usuario[0]['tipo'];

        header( 'Location: ../' );
                

    }
}

?>