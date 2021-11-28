<?php
    require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){
        
        $sql = $pdo->query("SELECT * FROM pedidos");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $item){
                $array['result'][] = [
                    'id' => $item['id'],
                    'cliente' => $item['cliente'],
                    'produto' => $item['produto'],
                    'quantidade' => $item['quantidade'],
                    'trocas' => $item['trocas'],
                    'valor_unitario' => $item['valor_unitario'],
                    'valor' => $item['valor'],
                    'data_emissao' => $item['data_emissao'],
                    'data_entrega' => $item['data_entrega'],
                    'vendedor' => $item['vendedor'],
                    'pendente' => $item['pendente'],
                    'separado' => $item['separado'],
                    'total' => $item['total']
                ];
            }
        }
    }
    else{
        $array['error'] = 'Método não permitido';
    }

    require('../return.php');
?>