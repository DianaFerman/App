<?php
require_once('db.php');
require_once('../modelo/Response.php');
require_once('../modelo/Tareas.php');
try{
$writeDB=DB::connectWriteDB();
$readDB=DB::connectReadDB();
}
catch(PDOException $e) {
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(500);
    $response->addMessage("Error en la coneccion a la base");
    $response->send();
    exit;
}
if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
  header('Access-Control-Allow-Methods: POST, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type');
  header('Access-Control-Max-Age: 86400');
  $response=new Response();
  $response->setSuccess(true);
  $response->setHttpStatusCode(200);
  $response->send();
  exit;
}
//if para borrar la session por medio del id de esta
if(array_key_exists('sessionid',$_GET)){
//obtenemos el id que le pasamos por parametro
$sessionid=$_GET['sessionid'];
//si no es numerico marcara error
if($sessionid=='' || !is_numeric($sessionid)){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    ($sessionid==='' ? $response->addMessage('Session ID cannot be blank') : false);
    (!is_numeric($sessionid) ? $response->addMessage('Session ID must be numeric') : false);
    $response->send();
    exit;
}
//si no le mandamos el token igual marcara error
if(!isset($_SERVER['HTTP_AUTHORIZATION']) || strlen($_SERVER['HTTP_AUTHORIZATION']) < 1 ){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(401);
    (!isset($_SERVER['HTTP_AUTHORIZATION']) ? $response->addMessage('Acces token is missing from the header') : false);
    (strlen($_SERVER['HTTP_AUTHORIZATION']) < 1 ? $response->addMessage('Acces token cannot be blank') : false);
    $response->send();
    exit;
}
//obtenemos el token que le pasamos
$accesstoken=$_SERVER['HTTP_AUTHORIZATION'];
//metodo DELETE para borrar
if($_SERVER['REQUEST_METHOD']==='DELETE'){
    try{
        //procedemos a borrar la sesion
        $query=$writeDB->prepare('DELETE FROM sesion WHERE id=:id AND token=:token');
        $query->bindParam(':id',$sessionid,PDO::PARAM_INT);
        $query->bindParam(':token',$accesstoken,PDO::PARAM_STR);
        $query->execute();
        $rowCount=$query->rowCount();
        if($rowCount===0){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(400);
        $response->addMessage("failed to log out of this session using access token provided");
        $response->send();
        exit;
        }
        //borramos la sesion
        $returnData=array();
        $returnData['session_id']=intval($sessionid);
        $response=new Response();
        $response->setSuccess(true);
        $response->setHttpStatusCode(200);
        $response->addMessage("Session Cerrada");
        $response->setData($returnData);
        $response->send();
        exit;


    }
    catch(PDOException $e) {
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(500);
        $response->addMessage("error al borrar la session");
        $response->send();
        exit;
    }
}
}
//verificamos que no se mande nada por get
elseif(empty($_GET)){
 ///////////
 if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(405);
    $response->addMessage("Request method not allowed");
    $response->send();
    exit;
 }
 //sleep(1);
 if($_SERVER['CONTENT_TYPE'] !== 'application/json' ){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage("Content type header not ser to JSON");
    $response->send();
    exit;
 }
 $rawPostData=file_get_contents('php://input');
 if(!$jsonData=json_decode($rawPostData)){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage("Request body is not valid JSON");
    $response->send();
    exit;
 }
 if(!isset($jsonData->correo) || !isset($jsonData->password)){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage('Campo no enviado');
    $response->send();
    exit;
 }
 if(  strlen($jsonData->correo) < 1  || strlen($jsonData->password) < 1   ){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage("Campos enviados en blanco");
    $response->send();
    exit;
 }


try{
$correo=$jsonData->correo;
$passworduser=$jsonData->password;
$query=$writeDB->prepare('SELECT * FROM usuario WHERE correo=:correo');
$query->bindParam(':correo',$correo,PDO::PARAM_STR);
$query->execute();
$rowCount=$query->rowCount();
if($rowCount===0){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(200);
    $response->addMessage("User or Password is incorrect");
    $response->send();
    exit;
}
$row=$query->fetch(PDO::FETCH_ASSOC);
$return_id= $row['id_usuario'];
$return_nombre=$row['nombre'];
$return_apellido=$row['apellido'];
$return_edad=$row['edad'];
$return_peso=$row['peso'];
$return_estura=$row['estatura'];
$return_movil=$row['movil'];
$return_correo=$row['correo'];
$return_tipo=$row['tipo'];

$accestoken=base64_encode(bin2hex(openssl_random_pseudo_bytes(24)).time());
$query=$writeDB->prepare('INSERT INTO sesion(userId,token) VALUES (:userId,:token)');
    $query->bindParam(':userId',$return_id,PDO::PARAM_INT);
    $query->bindParam(':token',$accestoken,PDO::PARAM_STR);
    
    $query->execute();
    $lastSessionID=$writeDB->lastInsertId();

    $returnData=array();
    $returnData['id_token']=$lastSessionID;
    $returnData['id_usuario']=$return_id;
    $returnData['token']=$accestoken;
    $returnData['tipo']=$return_tipo;

    $response=new Response();
    $response->setSuccess(true);
    $response->setHttpStatusCode(201);
    $response->setData($returnData);
    $response->send();
    exit;
}
catch(PDOException $e) {
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(500);
    $response->addMessage("There was an issue loggin in");
    $response->send();
    exit;
}


 ///////////
}
else{
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(404);
    $response->addMessage("Endpoint not found");
    $response->send();
    exit;
}
