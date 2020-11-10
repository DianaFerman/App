<?php
require_once('db.php');
require_once('../modelo/Response.php');
try{
$writeDB=DB::connectWriteDB();
$readDB=DB::connectReadDB();
}
catch(PDOException $e) {
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(500);
    $response->addMessage("Database coneccion erronea");
    $response->send();
    exit;
}