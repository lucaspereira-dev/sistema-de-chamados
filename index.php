<?php

require_once("./classs/controller/suporte.php");
require_once("./classs/models/suporteDB.php");
require_once("./classs/models/database.php");

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET"){
    require_once("./public/index.php");
}elseif($method == "POST"){
    $new = new Class\Controller\Suporte;
    $new->novoChamado($_POST);
}