<?php
class TaskException extends Exception{}
class Tareas{
    private $_id;
    private $_titulo;
    private $_descripcion;
    private $_deadline;
    private $_completada;

    public function __construct($id,$titulo,$descripcion,$fecha,$completada){
        $this->setId($id);
        $this->setTitle($titulo);
        $this->setDescription($descripcion);
        $this->setFecha($fecha);
        $this->setCompleta($completada);
    }

    public function getId(){
        return $this->_id;
    }
    public function getTitulo(){
        return $this->_titulo;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getFecha(){
        return $this->_deadline;
    }
    public function getCompletada(){
        return $this->_completada;
    }
    public function setId($id){
       if(($id!==null) && (!is_numeric($id) || $id <= 0 || $id > 982828282828282828282 || $this->_id !== null)){
        throw new TaskException("task ID error");
       } 
       $this->_id=$id;
    }
    public function setTitle($title){
        if(strlen($title) < 0 || strlen($title) > 255 ){
            throw new TaskException("task title error");
        }
        $this->_titulo=$title;
    }
    public function setDescription($descipcion){
        if(($descipcion !== null) && (strlen($descipcion) > 10202020) ){
            throw new TaskException("Error en la descripcion");
        }
        $this->_descripcion=$descipcion;
    }

    public function setCompleta($completada){
        if(strtoupper($completada) !== 'Y' && strtoupper($completada) !== 'N'){
            throw new TaskException("tarea completada erro ( Y/N)");
        }
        $this->_completada=$completada;
    }

    public function setFecha($deadLine){
        if(($deadLine !== null) && date_format(date_create_from_format('d/m/Y H:i',$deadLine),'d/m/Y H:i') != $deadLine){
            throw new TaskException("error al ingresar la fecha");
        }
        $this->_deadline=$deadLine;
    }

    public function returnTareasArray(){
        $tareas=array();
        $tareas['id']=$this->getId();
        $tareas['tiutlo']=$this->getTitulo();
        $tareas['descripcion']=$this->getDescripcion();
        $tareas['fecha']=$this->getFecha();
        $tareas['completada']=$this->getCompletada();
        return $tareas;
    }

}