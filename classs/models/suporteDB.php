<?php

namespace Class\Models;

class SuporteDB{

    public static function INSERT(Array $params){

        $conn = new Database();

        $conn->setQuery("INSERT INTO tbl_chamados(status_chamado, titulo, descricao, requerente, data_solicitacao, log_insert) VALUES (:STATUS_CHAMADO, :TITULO, :DESCRICAO, :REQUERENTE, :DATA_SOLICITACAO, NOW()); ",
         array(
            ":STATUS_CHAMADO"=>$params["status"], 
            ":TITULO"=>$params["titulo"], 
            ":DESCRICAO"=>$params["descricao"], 
            ":REQUERENTE"=>$params["requerente"], 
            ":DATA_SOLICITACAO"=>$params["data"]
         ));
    }

    public static function SELECT($id = null){

        $conn = new Database();

        return $conn->select("SELECT * FROM tbl_chamados");
    }

    public static function DELETE(int $id){

        $conn = new Database();

        $conn->query("DELETE FROM tbl_chamados WHERE id = :ID",
         array(
            ":ID"=>$id, 
         ));
    }

    public static function UPDATE(Array $params, int $id){
        
    }
}