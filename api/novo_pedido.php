<?php
    require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    
    if($method === 'post'){

        $data = json_decode(file_get_contents('php://input'), true);

        $cliente = $data['cliente'];
        $produto = $data['produto'];
        $quantidade = $data['quantidade'];
        $trocas = $data['trocas'];
        $valor_unitario = $data['valor_unitario'];
        $valor = $data['valor'];
        $data_emissao = $data['data_emissao'];
        $data_entrega = $data['data_entrega'];
        $vendedor = $data['vendedor'];
        $pendente = $data['pendente'];
        $separado = $data['separado'];
        $total = $data['total'];

        if($cliente && $produto){
            $sql = $pdo->prepare("INSERT INTO pedidos (cliente, produto, quantidade, trocas, valor_unitario, valor, data_emissao, data_entrega, vendedor, pendente, separado, total) VALUES (:cliente, :produto, :quantidade, :trocas, :valor_unitario, :valor, :data_emissao, :data_entrega, :vendedor, :pendente, :separado, :total)");
            $sql->bindValue(':cliente', $cliente);
            $sql->bindValue(':produto', $produto);
            $sql->bindValue(':quantidade', $quantidade);
            $sql->bindValue(':trocas', $trocas);
            $sql->bindValue(':valor_unitario', $valor_unitario);
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':data_emissao', $data_emissao);
            $sql->bindValue(':data_entrega', $data_entrega);
            $sql->bindValue(':vendedor', $vendedor);
            $sql->bindValue(':pendente', $pendente);
            $sql->bindValue(':separado', $separado);
            $sql->bindValue(':total', $total);
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