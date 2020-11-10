<?php

require_once('db.php');
require_once('../modelo/Response.php');
require_once('../modelo/Tareas.php');
require_once('../modelo/Usuarios.php');
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
  $rutav=explode("/",$_SERVER["REQUEST_URI"]);
    $arreglov=array_filter($rutav);

/*if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(405);
    $response->addMessage("Metodo no reconocido");
    $response->send();
    exit;
}*/
if($_SERVER['REQUEST_METHOD'] === 'POST'){

if($_SERVER['CONTENT_TYPE'] !== 'application/json'){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage("Content Type not set JSON");
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
if(!isset($jsonData->nombre) || !isset($jsonData->apellido) || !isset($jsonData->edad) || !isset($jsonData->peso) || !isset($jsonData->estatura)|| !isset($jsonData->movil) || !isset($jsonData->correo) || !isset($jsonData->contrasena)){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage("Campos inexistentes");
    $response->send();
    exit;
}


if(strlen($jsonData->nombre) < 1 || strlen($jsonData->apellido) < 1 || strlen($jsonData->edad) < 1 || strlen($jsonData->peso) < 1 || strlen($jsonData->estatura) < 1 || strlen($jsonData->movil) < 1 || strlen($jsonData->correo) < 1 || strlen($jsonData->contrasena) < 1 ){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(400);
    $response->addMessage("Full name cannot be blank");
    $response->send();
    exit;
}

$nombre=trim($jsonData->nombre);
$apellido=trim($jsonData->apellido);
$edad=trim($jsonData->edad);
$peso=trim($jsonData->peso);
$estatura=trim($jsonData->estatura);
$movil=trim($jsonData->movil);
$correo=trim($jsonData->correo);
$contraseña=trim($jsonData->contrasena);
$tipo=trim($jsonData->tipo);

$actividad_fisica=trim($jsonData->actividad_fisica);
$evacuacion=trim($jsonData->evacuacion);
$padecimientos=trim($jsonData->padecimientos);
$medicacion=trim($jsonData->medicacion);

try{
   $query=$writeDB->prepare("SELECT id_usuario FROM usuario where correo=:correo");
   $query->bindParam(':correo',$correo,PDO::PARAM_STR);
   $query->execute();
   $row=$query->rowCount();
   if($row !== 0){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(409);
    $response->addMessage("Usuario existente");
    $response->send();
    exit;
   }
   $hashed_password=password_hash($contraseña,PASSWORD_DEFAULT);
   $query=$writeDB->prepare("INSERT INTO usuario (nombre,apellido,edad,peso,estatura,movil,correo,password,tipo) VALUES (:nombre,:apellido,:edad,:peso,:estatura,:movil,:correo,:password,:tipo)");
   $query->bindParam(':nombre',$nombre,PDO::PARAM_STR);
   $query->bindParam(':apellido',$apellido,PDO::PARAM_STR);
   $query->bindParam(':edad',$edad,PDO::PARAM_STR);
   $query->bindParam(':peso',$peso,PDO::PARAM_STR);
   $query->bindParam(':estatura',$estatura,PDO::PARAM_STR);
   $query->bindParam(':movil',$movil,PDO::PARAM_STR);
   $query->bindParam(':correo',$correo,PDO::PARAM_STR);
   $query->bindParam(':password',$hashed_password,PDO::PARAM_STR);
   $query->bindParam(':tipo',$tipo,PDO::PARAM_STR);
   $query->execute();
   $row=$query->rowCount();
   if($row===0){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(500);
        $response->addMessage("Error al registrar");
        $response->send();
        exit;
   }
   $lastId=$writeDB->lastInsertId();


   ////

   $query=$writeDB->prepare("INSERT INTO usuario_test (id_usuario,actividad_fisica,evacuacion,padecimientos,medicacion) VALUES (:id_usuario,:actividad_fisica,:evacuacion,:padecimientos,:medicacion)");
   $query->bindParam(':id_usuario',intval($lastId),PDO::PARAM_INT);
   $query->bindParam(':actividad_fisica',$actividad_fisica,PDO::PARAM_STR);
   $query->bindParam(':evacuacion',$evacuacion,PDO::PARAM_STR);
   $query->bindParam(':padecimientos',$padecimientos,PDO::PARAM_STR);
   $query->bindParam(':medicacion',$medicacion,PDO::PARAM_STR);
   
   $query->execute();
   $row=$query->rowCount();
   if($row===0){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(500);
        $response->addMessage("Error al registrar");
        $response->send();
        exit;
   }

   ////

   $returnData=array();
   $returnData['id_usuario']=$lastId;
  
        $response=new Response();
        $response->setSuccess(true);
        $response->setHttpStatusCode(201);
        $response->addMessage("Usuario creado");
        $response->setData($returnData);
        $response->send();
        exit;
    }
    catch(PDOException $e) {
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(500);
        $response->addMessage("Error al crear el usuario");
        $response->send();
        exit;
    }


}elseif(array_key_exists('userid',$_GET) && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $userid=$_GET['userid'];
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
    $query=$writeDB->prepare('SELECT nombre,apellido,edad,estatura,peso,movil,correo from usuario  WHERE id_usuario=:userid ');
    $query->bindParam(':userid',$userid,PDO::PARAM_INT);
    //$query->bindParam(':token',$accesstoken,PDO::PARAM_STR);
    $query->execute();
    $rowCount=$query->rowCount();
    if($rowCount === 0){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(401);
        $response->addMessage("Invalid access token or id user");
        $response->send();
        exit;
    }
            $row=$query->fetch(PDO::FETCH_ASSOC);
            $returnDatos=array();
            $returnDatos['nombre']=$row['nombre'];
            $returnDatos['apellido']=$row['apellido'];
            $returnDatos['edad']=$row['edad'];
            $returnDatos['estatura']=$row['estatura'];
            $returnDatos['movil']=$row['movil'];
            $returnDatos['correo']=$row['correo'];
            $returnDatos['peso']=$row['peso'];
            
            $response=new Response();
            $response->setSuccess(true);
            $response->toCache(true);
            $response->setHttpStatusCode(200);
            $response->setData($returnDatos);
            $response->send();
            exit; 
}

elseif($arreglov[2]=="all"){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        if(!isset($_SERVER['HTTP_AUTHORIZATION']) || strlen($_SERVER['HTTP_AUTHORIZATION']) < 1 ){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(401);
            (!isset($_SERVER['HTTP_AUTHORIZATION']) ? $response->addMessage('Acces token is missing from the header') : false);
            (strlen($_SERVER['HTTP_AUTHORIZATION']) < 1 ? $response->addMessage('Acces token cannot be blank') : false);
            $response->send();
            exit;
        }
        $accesstoken=$_SERVER['HTTP_AUTHORIZATION'];
        $query=$writeDB->prepare('SELECT *from sesion  WHERE  token=:token');
        $query->bindParam(':token',$accesstoken,PDO::PARAM_STR);
        $query->execute();
        $rowCount=$query->rowCount();
        if($rowCount === 0){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(401);
            $response->addMessage("Invalid access token or id user");
            $response->send();
            exit;
        }
        $query=$writeDB->prepare('SELECT * FROM usuario');
        $query->execute();
        $rowCount=$query->rowCount();
        while($row=$query->fetch(PDO::FETCH_ASSOC)){
            $usuarioNew=new UsuariosModel($row['id_usuario'],$row['nombre'],$row['apellido']);
            $arregloUsuarios[]=$usuarioNew->returnUsuariosArray();
        }
        $returnDatos=array();
        $returnDatos['datos_retiornados']=$rowCount;
        $returnDatos['usuarios']=$arregloUsuarios;
                $response=new Response();
                $response->setSuccess(true);
                $response->toCache(true);
                $response->setHttpStatusCode(200);
                $response->setData($returnDatos);
                $response->send();
                exit; 

    }
}

else{
 $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(405);
    $response->addMessage("Metodo no reconocido");
    $response->send();
    exit;
}
