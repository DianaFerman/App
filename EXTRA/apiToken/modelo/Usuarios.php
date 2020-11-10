<?php
class UsuariosModel{
    private $id_usuario;
    private $nombre;
    private $apellido;

    public function __construct($id_usuario,$nombre,$apellido){
        $this->setId($id_usuario);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }

    public function getId(){
        return $this->id_usuario;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
   
    public function setId($id){
      
       $this->id_usuario=$id;
    }
    public function setNombre($nombre){
      
        $this->nombre=$nombre;
     }
     public function setApellido($apellido){
      
        $this->apellido=$apellido;
     }
   

    public function returnUsuariosArray(){
        $usuario=array();
        $usuario['id']=$this->getId();
        $usuario['nombre']=$this->getNombre();
        $usuario['apellido']=$this->getApellido();
        return $usuario;
    }

}