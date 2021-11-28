<?php
    require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    
    if($method === 'post'){

        $cliente = filter_input(INPUT_POST, 'cliente');

        if($cliente){
            $sql = $pdo->prepare("INSERT INTO pedidos (cliente) VALUES (:cliente)");
            $sql->bindValue(':cliente', $cliente);
            $sql->execute();

            $id = $pdo->lastInsertId();

            $array['result'] = [
                'id' => $id,
                'cliente' => $cliente
            ];
        }
        else{
            $array['error'] = 'Campos não enviados';
        }
    }
    else{
        $array['error'] = 'Método não permitido';
    }

    require('../return.php');
?>