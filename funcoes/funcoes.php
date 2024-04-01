<?php 


function buscandoUsuario($id, $conexao){
    $sql = "select * from usuario where id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscandoBanco($id, $conexao){
    $sql = "select * from banco where usuario_id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscandoRegistrosProfessor($id, $conexao){
    $sql = "select * from registros INNER JOIN unidade ON unidade.id = registros.unidade_id AND registros.usuario_id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscandoRegistros($conexao){
    $sql = "SELECT 
                    registros.*, 
                    unidade.nome AS nome_unidade, 
                    usuario.nome AS nome_usuario 
                    FROM registros 
                    INNER JOIN unidade ON unidade.id = registros.unidade_id 
                    INNER JOIN usuario ON usuario.id = registros.usuario_id;";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscandoRelatorio($conexao){
    $sql = "SELECT 
                    usuario.id, 
                    usuario.valor,
                    unidade.nome AS nome_unidade,
                    usuario.nome, 
                    COUNT(registros.id) AS total_registros,
                    SUM(usuario.valor) AS total_valor
                FROM 
                    usuario 
                INNER JOIN 
                    registros ON registros.usuario_id = usuario.id 
                INNER JOIN 
                    unidade ON registros.unidade_id = unidade.id
                WHERE 
                    registros.status = 1
                GROUP BY 
                    usuario.id 
                HAVING 
                    COUNT(usuario.id) > 1;";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function filtrandoRegistro($conexao, $ano, $mes){
        $sql = "SELECT 
                    usuario.id, 
                    usuario.valor,
                    unidade.nome AS nome_unidade,
                    usuario.nome, 
                    COUNT(registros.id) AS total_registros,
                    SUM(usuario.valor) AS total_valor
                FROM 
                    usuario 
                INNER JOIN 
                    registros ON registros.usuario_id = usuario.id 
                INNER JOIN 
                    unidade ON registros.unidade_id = unidade.id
                WHERE 
                    registros.status = 1
                AND
                    (MONTH(registros.data) = :mes OR YEAR(registros.data) = :ano)
                GROUP BY 
                    usuario.id 
                HAVING 
                    COUNT(usuario.id) > 1";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
        $stmt->bindParam(':mes', $mes, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function buscandoProfessor($email, $conexao){
    $sql = "select * from usuario where email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function cadastrarProfessor($conexao, $nome, $email, $senha, $valor){

    $senhaHash = sha1($senha); 
    $tipo = 0;

    $sql = "INSERT INTO usuario (nome, email, senha, valor, tipo) VALUES (:nome, :email, :senha, :valor, :tipo)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senhaHash, PDO::PARAM_STR);
    $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
    if ($stmt->execute()) { 
        return true;
    } else {
        return false;
    }

}

function cadastrarHorario($conexao, $id, $data, $horarioInicio, $horarioFim, $metodo, $observacao, $unidade){

    $status = 0; //em analise

    $sql = "INSERT INTO registros (data, hora_inicio, hora_termino, status, tipo, observacao, usuario_id, unidade_id) VALUES (:data, :hora_inicio, :hora_termino, :status, :tipo, :observacao, :usuario_id, :unidade_id)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':data', $data, PDO::PARAM_STR);
    $stmt->bindParam(':hora_inicio', $horarioInicio, PDO::PARAM_STR);
    $stmt->bindParam(':hora_termino', $horarioFim, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $metodo, PDO::PARAM_STR);
    $stmt->bindParam(':observacao', $observacao, PDO::PARAM_STR);
    $stmt->bindParam(':usuario_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':unidade_id', $unidade, PDO::PARAM_INT);
    if ($stmt->execute()) { 
        return true;
    } else {
        return false;
    }

}