<?php
    require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){
        
        $sql = $pdo->query("SELECT * FROM clientes");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $item){
                $array['result'][] = [
                    'id' => $item['id'],
                    'razao_social' => $item['razao_social'],
                    'nome_fantasia' => $item['nome_fantasia'],
                    'cnpj' => $item['cnpj'],
                    'endereco' => $item['endereco'],
                    'cep' => $item['cep'],
                    'contato_nome' => $item['contato_nome'],
                    'email' => $item['email'],
                    'telefone_1' => $item['telefone_1'],
                    'telefone_2' => $item['telefone_2'],
                    'telefone_3' => $item['telefone_3']
                ];
            }
        }
    }
    else{
        $array['error'] = 'Método não permitido';
    }

    require('../return.php');
?>