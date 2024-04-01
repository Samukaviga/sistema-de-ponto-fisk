<?php

require_once('../conexao.php');
require_once('./funcoes.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];

   
    $filtro = filtrandoRegistro($conexao, $ano, $mes);


    var_dump($filtro);
   
}