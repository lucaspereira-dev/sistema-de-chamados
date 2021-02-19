<?php

namespace Class\Controller;

use DateTime;
use Class\Models;
use Exception;

class Suporte{

    public function alert($mensagem, $cor){
        echo '<script language="javascript" type="text/javascript">';
        echo "window.onload = function() { Aviso($mensagem, $cor); }";
        echo "</script>";
    }

    public function novoChamado(Array $params){

        if(count($params) != 5){
            header("Location: /");
            $this->alert("Não foi possível adicionar novo chamado! \n Verifique os campos", "Red");
        }

        foreach($params as $value){
            if(empty($value)){
                header("Location: /");
                $this->alert("Não foi possível adicionar novo chamado! \n Verifique os campos", "Red");
            }
        }

        $params["data"] = (new DateTime(str_replace("/", "-", $params["data"])))->format("Y-m-d");

        try{

            Models\SuporteDB::INSERT($params);

            header("Location: /");
            $this->alert("Novo chamado adicionado com sucesso!", "Green");

        }catch(Exception $e){
            die("Erro ao adicionar ao banco: ". $e->getMessage());
        }

    }

    public function get($id = null){
        return Models\SuporteDB::SELECT($id);
    }
}