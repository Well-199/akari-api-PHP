<?php
    require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){
        
        $senha = filter_input(INPUT_GET, 'senha');

        if($senha){
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE senha = :senha");
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if($sql->rowCount() > 0){

                $data = $sql->fetch(PDO::FETCH_ASSOC);

                $array['result'] = [
                    'id' => $data['id'],
                    'nome' => $data['nome'],
                    'senha' => $data['senha']
                ];
            }
            else{
                $array['error'] = 'Usuario inexistente';
            }
        }
        else{
            $array['error'] = 'Campo Vazio';
        }
    }
    else{
        $array['error'] = 'Método não permitido';
    }

    require('../return.php');
?>