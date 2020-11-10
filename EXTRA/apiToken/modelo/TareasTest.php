<?php
require_once('Tareas.php');
try{
    $task=new Tareas(1,"Cuentos","Relatos de niños","01/01/2019 12:00","N");
    header("Content-type: application/json;charset=UTF-8");
    echo json_encode($task->returnTareasArray());
}catch(TaskException $ex){
    echo"error: ".$ex->getMessage();
}