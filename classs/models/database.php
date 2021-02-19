<?php

namespace Class\Models;

use \PDO;
use \Exception;

class Database extends PDO{

    private $dbname = "db_chamados";
    private $user = "lucas";
    private $password = "1046";
    private $host = "localhost";

    private $conn;

    public function __construct()
    {
       try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
       }catch(Exception $e){
           die("Erro ao conectar ao banco de dados: ". $e->getMessage());
       }
    }

    private function setParams($statment, $parameters = array()){

        foreach($parameters as $key=>$value){
            $this->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value){
        $statment->bindParam($key, $value);
    }

    public function setQuery($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array()){

        $stmt = $this->setQuery($rawQuery, $params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}