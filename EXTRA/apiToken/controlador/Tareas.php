<?php
require_once('db.php');
require_once('../modelo/Response.php');
require_once('../modelo/Tareas.php');
require_once('../modelo/Dietas.php');
require_once('../recepciones/NombreDieta.php');
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
$rutav=explode("/",$_SERVER["REQUEST_URI"]);
$arreglov=array_filter($rutav);
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

/////////relacion tareas usuario///////////

//preguntamos si pasamos el token
if(!isset($_SERVER['HTTP_AUTHORIZATION']) || strlen($_SERVER['HTTP_AUTHORIZATION']) < 1 ){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(401);
    (!isset($_SERVER['HTTP_AUTHORIZATION']) ? $response->addMessage('Access token is missing from the header'):false);
    (strlen($_SERVER['HTTP_AUTHORIZATION']) < 1? $response->addMessage('Access token cannotbe blank'):false);
    $response->send();
    exit;
}
//obtenemos el token
$accesstoken=$_SERVER['HTTP_AUTHORIZATION'];
try{
//ya que tenemos el token obtenemos los datos de la tabla session
$query=$writeDB->prepare('SELECT userId,token from sesion WHERE  token=:accestoken');
$query->bindParam(':accestoken',$accesstoken,PDO::PARAM_STR);
$query->execute();
$rowCount=$query->rowCount();
//si la consulta no nos devuelve resultados los mostraremos
if($rowCount === 0){
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(401);
    $response->addMessage("Invalid access token");
    $response->send();
    exit;
}
//como nos devolvio resultados asoiaremos estos y obtendremos el id del usuario etc.
$row =$query->fetch(PDO::FETCH_ASSOC);
$return_userid=$row['userId'];
}
catch(PDOException $e) {
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(500);
    $response->addMessage("There was an issue authenticating - please try again");
    $response->send();
    exit;
}
/////////relacion tareas usuario///////////


//buscar una tarea en especifico por el id

if($arreglov[2]=="all"){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        try{
            $consulta=$readDB->prepare('SELECT * FROM dietas_usuarios WHERE id_usuario=:id_usuario');
            $consulta->bindParam(':id_usuario',intval($return_userid),PDO::PARAM_INT);
            $consulta->execute();
            $rowCount=$consulta->rowCount();
            if($rowCount===0){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(404);
                $response->addMessage("dietas sin fondos");
                $response->send();
                exit; 
            }
            while($row=$consulta->fetch(PDO::FETCH_ASSOC)){
                
                $a=nombreModel::obtenerValor('dietas_desayuno',$row['desayuno']);
                $b=nombreModel::obtenerValor('dietas_entrecomidas',$row['entre_comidas']);
                $c=nombreModel::obtenerValor('dietas_comida',$row['comida']);
                $d=nombreModel::obtenerValor('dietas_cena',$row['cena']);
                
                $tarea=new DietasModel($row['id'],$row['dia_semana'],$a,$b,$c,$d);
                $arregloTareas[]=$tarea->returnDietasArray();
            }
            $returnDatos=array();
            $returnDatos['datos_retiornados']=$rowCount;
            $returnDatos['dietas']=$arregloTareas;
                $response=new Response();
                $response->setSuccess(true);
                $response->toCache(true);
                $response->setHttpStatusCode(200);
                $response->setData($returnDatos);
                $response->send();
                exit; 
            
        }
        catch(TaskException $ex){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(500);
                $response->addMessage($ex->getMessage());
                $response->send();
                exit; 
        }
        catch(PDOException $ex){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(500);
            $response->addMessage("Error de consulta a la base de datos aqui");
            $response->send();
            exit;
        }
    }
}elseif($arreglov[2]=="crearDietasUsuario" && $_SERVER['REQUEST_METHOD']==='POST'){
    $usuario=array();
    $arreglo=array('lunes','martes','miercoles','jueves','viernes');
    for($i=0;$i<count($arreglo);$i++){
        $desayunoID=nombreModel::obtenerDietaAleatoria('dietas_desayuno');
        $comidaID=nombreModel::obtenerDietaAleatoria('dietas_comida');
        $cenaID=nombreModel::obtenerDietaAleatoria('dietas_cena');
        $entreComidasID=nombreModel::obtenerDietaAleatoria('dietas_entrecomidas');
        $tarea=new DietasModel($return_userid,$arreglo[$i],$desayunoID,$entreComidasID,$comidaID,$cenaID);
        $arregloTareas[]=$tarea->returnDietasArray();
    }
    for($i=0;$i<count($arregloTareas);$i++){
        $consulta=$readDB->prepare('INSERT INTO dietas_usuarios(id_usuario,dia_semana,desayuno,entre_comidas,comida,cena) VALUES(:id_usuario,:dia_semana,:desayuno,:entre_comidas,:comida,:cena)');
        $consulta->bindParam(':id_usuario',intval($arregloTareas[$i]['id']),PDO::PARAM_INT);
        $consulta->bindParam(':dia_semana',$arregloTareas[$i]['dia_semana'],PDO::PARAM_STR);
        $consulta->bindParam(':desayuno',intval($arregloTareas[$i]['desayuno']),PDO::PARAM_INT);
        $consulta->bindParam(':entre_comidas',intval($arregloTareas[$i]['entre_comidas']),PDO::PARAM_INT);
        $consulta->bindParam(':comida',intval($arregloTareas[$i]['comida']),PDO::PARAM_INT);
        $consulta->bindParam(':cena',intval($arregloTareas[$i]['cena']),PDO::PARAM_INT);
        $consulta->execute();
}
$response=new Response();
$response->setSuccess(true);
$response->toCache(true);
$response->setHttpStatusCode(200);
$response->addMessage("Dietas ajustadas");
$response->send();
exit; 
}
elseif(array_key_exists('tarea',$_GET)){
    $tarea=$_GET['tarea'];
    if($_SERVER['REQUEST_METHOD']==='GET'){
        try{
            $consulta=$readDB->prepare('SELECT * FROM dietas_usuarios WHERE id=:id AND id_usuario=:id_usuario');
            $consulta->bindParam(':id',intval($tarea),PDO::PARAM_INT);
            $consulta->bindParam(':id_usuario',intval($return_userid),PDO::PARAM_INT);
            $consulta->execute();
            $rowCount=$consulta->rowCount();
            if($rowCount===0){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(404);
                $response->addMessage("dietas sin fondos");
                $response->send();
                exit; 
            }
            $row=$consulta->fetch(PDO::FETCH_ASSOC);
            $returnDatos=array();
            $returnDatos['id']=$row['id'];
            $returnDatos['dia_semana']=$row['dia_semana'];
            $returnDatos['desayuno']=nombreModel::obtenerValor('dietas_desayuno',$row['desayuno']);
            $returnDatos['entre_comidas']=nombreModel::obtenerValor('dietas_entrecomidas',$row['entre_comidas']);
            $returnDatos['comida']=nombreModel::obtenerValor('dietas_comida',$row['comida']);
            $returnDatos['cena']=nombreModel::obtenerValor('dietas_cena',$row['cena']);
                $response=new Response();
                $response->setSuccess(true);
                $response->toCache(true);
                $response->setHttpStatusCode(200);
                $response->setData($returnDatos);
                $response->send();
                exit; 
            
        }
        catch(TaskException $ex){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(500);
                $response->addMessage($ex->getMessage());
                $response->send();
                exit; 
        }
        catch(PDOException $ex){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(500);
            $response->addMessage("Error de consulta a la base de datos");
            $response->send();
            exit;
        }
    }
}
elseif(array_key_exists('completas',$_GET)){
    $completas=$_GET['completas'];
    if($completas !=="Y" && $completas !=="N"){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(400);
        $response->addMessage("Ingresa parametros correctos");
        $response->send();
        exit; 
    }
    if($_SERVER['REQUEST_METHOD']==='GET'){

        try{
            $consulta=$readDB->prepare('SELECT id,titulo,descripcion,DATE_FORMAT(fecha,"%d/%m/%Y %H:%i") as fecha,completada FROM tarea WHERE completada=:completada AND userid=:userid');
            $consulta->bindParam(':completada',$completas,PDO::PARAM_STR);
            $consulta->bindParam(':userid',$return_userid,PDO::PARAM_INT);
            $consulta->execute();
            $rowCount=$consulta->rowCount();
            //$arregloTareas[]=array();
            while($row=$consulta->fetch(PDO::FETCH_ASSOC)){
                $tarea=new Tareas($row['id'],$row['titulo'],$row['descripcion'],$row['fecha'],$row['completada']);
                $arregloTareas[]=$tarea->returnTareasArray();
            }
            $returnDatos=array();
            $returnDatos['datos_retiornados']=$rowCount;
            $returnDatos['tareas']=$arregloTareas;
                $response=new Response();
                $response->setSuccess(true);
                $response->toCache(true);
                $response->setHttpStatusCode(200);
                $response->setData($returnDatos);
                $response->send();
                exit;

        }catch(TaskException $ex){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(500);
                $response->addMessage($ex->getMessage());
                $response->send();
                exit; 
        }
        catch(PDOException $ex){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(500);
            $response->addMessage("Error de consulta a la base de datos");
            $response->send();
            exit;
        }
    }else{
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(405);
        $response->addMessage("método de solicitud no permitido");
        $response->send();
        exit;   
    }}
elseif(array_key_exists('page',$_GET)){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $page=$_GET['page'];
        if($page=='' || !is_numeric($page)){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(400);
        $response->addMessage("la pagina solicitada no es numerica o esta vacia");
        $response->send();
        exit;  
        }
        $paginaLimite=20;
        try{
            $query=$readDB->prepare('SELECT count(id) as TotalTareas from tarea WHERE userid=:userid');
            $query->bindParam(':userid',$return_userid,PDO::PARAM_INT);
            $query->execute();
            $row=$query->fetch(PDO::FETCH_ASSOC);
            $taskCount=intval($row['TotalTareas']);
            $numeroPaginas=ceil($taskCount/$paginaLimite);
            if($numeroPaginas==0){
                $numeroPaginas=1;
            }
            if($page > $numeroPaginas){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(404);
                $response->addMessage("Page not found");
                $response->send();
                exit; 
            }
            $offset=($page==1 ? 0 : ($paginaLimite*($page-1)));
            $query=$readDB->prepare('SELECT id,titulo,descripcion,DATE_FORMAT(fecha,"%d/%m/%Y %H:%i") as fecha,completada FROM tarea WHERE userid=:userid limit :limite offset :inicio');
            $query->bindParam(':userid',$return_userid,PDO::PARAM_INT);
            $query->bindParam(":limite",$paginaLimite,PDO::PARAM_INT);
            $query->bindParam(":inicio",$offset,PDO::PARAM_INT);
            $query->execute();
            $rowCount=$query->rowCount();
            $taskArray=array();
            while($row=$query->fetch(PDO::FETCH_ASSOC)){
                $tarea=new Tareas($row['id'],$row['titulo'],$row['descripcion'],$row['fecha'],$row['completada']);
                $taskArray[]=$tarea->returnTareasArray();
            }
            $returnDatos=array();
            $returnDatos['datos_retornados']=$rowCount;
            $returnDatos['total_rows']=$taskCount;
            $returnDatos['num_pages']=$numeroPaginas;
            ($page < $numeroPaginas ? $returnDatos['has_nex_page']=true : $returnDatos['has_nex_page']=false);
            ($page > 1 ? $returnDatos['has_previus_page']=true : $returnDatos['has_previus_page']=false);
            $returnDatos['tareas']=$taskArray;
                $response=new Response();
                $response->setSuccess(true);
                $response->toCache(true);
                $response->setHttpStatusCode(200);
                $response->setData($returnDatos);
                $response->send();
                exit;

        }
        catch(TaskException $er){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(500);
        $response->addMessage($er->getMessage());
        $response->send();
        exit;  
        }
        catch(PDOException $ex){
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(500);
        $response->addMessage("Error en la consulta");
        $response->send();
        exit;  
        }
    }else{
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(405);
        $response->addMessage("método de solicitud no permitido");
        $response->send();
        exit;  
    }}
elseif(empty($_GET)){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        try{
            $consulta=$readDB->prepare('SELECT id,titulo,descripcion,DATE_FORMAT(fecha,"%d/%m/%Y %H:%i") as fecha,completada FROM tarea WHERE userid=:userid');
            $consulta->bindParam(':userid',$return_userid,PDO::PARAM_INT);
            $consulta->execute();
            $rowCount=$consulta->rowCount();
            $arregloTareas=array();
            while($row=$consulta->fetch(PDO::FETCH_ASSOC)){
                $tarea=new Tareas($row['id'],$row['titulo'],$row['descripcion'],$row['fecha'],$row['completada']);
                $arregloTareas[]=$tarea->returnTareasArray();
            }
            $returnDatos=array();
            $returnDatos['datos_retornados']=$rowCount;
            $returnDatos['tareas']=$arregloTareas;
                $response=new Response();
                $response->setSuccess(true);
                $response->toCache(true);
                $response->setHttpStatusCode(200);
                $response->setData($returnDatos);
                $response->send();
                exit;

        }catch(TaskException $ex){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(500);
                $response->addMessage($ex->getMessage());
                $response->send();
                exit; 
        }
        catch(PDOException $ex){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(500);
            $response->addMessage("Error de consulta a la base de datos");
            $response->send();
            exit;
        }


    }elseif($_SERVER['REQUEST_METHOD']==='POST'){
        //crear usuario
        try{
            if($_SERVER['CONTENT_TYPE'] != 'application/json'){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(400);
                $response->addMessage("content type header is not set JSON");
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
            if(!isset($jsonData->titulo) || !isset($jsonData->completada)){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(400);
                (!isset($jsonData->titulo) ? $response->addMessage("el campo titulo es obligatorio") : false);
                (!isset($jsonData->completada) ? $response->addMessage("el campo completada es obligatorio") : false);
                $response->send();
                exit; 
            }
            $tarea=new Tareas(null,$jsonData->titulo,(isset($jsonData->descripcion) ? $jsonData->descripcion :null),
            (isset($jsonData->fecha) ? $jsonData->fecha :null),(isset($jsonData->completada) ? $jsonData->completada :null) );
            $titulo=$tarea->getTitulo();
            $descripcion=$tarea->getDescripcion();
            $fecha=$tarea->getFecha();
            $completada=$tarea->getCompletada();
            $query=$writeDB->prepare('INSERT INTO tarea(titulo,descripcion, fecha, completada,userid) VALUES (:titulo,:descripcion,STR_TO_DATE(:fecha,\'%d/%m/%Y %H:%i\'),:completada,:userid)');
            $query->bindParam(':titulo',$titulo,PDO::PARAM_STR);
            $query->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
            $query->bindParam(':fecha',$fecha,PDO::PARAM_STR);
            $query->bindParam(':completada',$completada,PDO::PARAM_STR);
            $query->bindParam(':userid',$return_userid,PDO::PARAM_INT);
            $query->execute();
            $rowCount=$query->rowCount();
            if($rowCount===0){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(500);
                $response->addMessage("Fallo en crear el usuario");
                $response->send();
                exit; 
            }

            $recuperaId=$writeDB->lastInsertId();
            $query=$writeDB->prepare('SELECT id,titulo,descripcion,DATE_FORMAT(fecha,"%d/%m/%Y %H:%i") as fecha,completada FROM tarea WHERE id=:id AND userid=:userid');
            $query->bindParam(':id',$recuperaId,PDO::PARAM_INT);
            $query->bindParam(':userid',$return_userid,PDO::PARAM_INT);
            $query->execute();
            $rowCount=$query->rowCount();
            if($rowCount===0){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(500);
                $response->addMessage("Error al recuperar la tarea después de la creacion");
                $response->send();
                exit; 
            }
            $arregloTareas=array();
            while($row=$query->fetch(PDO::FETCH_ASSOC)){
                $tarea=new Tareas($row['id'],$row['titulo'],$row['descripcion'],$row['fecha'],$row['completada']);
                $arregloTareas[]=$tarea->returnTareasArray();
            }
            $returnDatos=array();
            $returnDatos['row_return']=$rowCount;
            $returnDatos['tareas']=$arregloTareas;
                $response=new Response();
                $response->setSuccess(true);
                $response->setHttpStatusCode(201);
                $response->addMessage("Tarea Creada");
                $response->setData($returnDatos);
                $response->send();
                exit; 
        }catch(TaskException $ex){
                $response=new Response();
                $response->setSuccess(false);
                $response->setHttpStatusCode(400);
                $response->addMessage($ex->getMessage());
                $response->send();
                exit; 
        }
        catch(PDOException $ex){
            $response=new Response();
            $response->setSuccess(false);
            $response->setHttpStatusCode(500);
            $response->addMessage("Error al insertar tarea");
            $response->send();
            exit;
        }
        //crear usuario
    }
    else{
        $response=new Response();
        $response->setSuccess(false);
        $response->setHttpStatusCode(405);
        $response->addMessage("método de solicitud no permitido");
        $response->send();
        exit;   
    }}
else{
    $response=new Response();
    $response->setSuccess(false);
    $response->setHttpStatusCode(405);
    $response->addMessage("punto de metodo no encontrado");
    $response->send();
    exit;  }





