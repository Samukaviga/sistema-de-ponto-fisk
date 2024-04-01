<?php

require_once('../conexao.php');

session_start();

$id_registro = $_GET['id_registro'];


$sql = "UPDATE registros SET status = 2 WHERE id = :registro";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':registro', $id_registro, PDO::PARAM_INT);

if($stmt->execute()):
    $_SESSION['mensagem.sucesso'] = 'Status alterado com sucesso!';
    header('Location: ../');
    exit();
else:
    $_SESSION['mensagem.erro'] = 'Falha ao alterar o Status';
    header('Location: ../');
    exit();
endif;