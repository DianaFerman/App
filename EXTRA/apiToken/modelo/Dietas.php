<?php
class DietasModel{
    private $id_usuario;
    private $dia_semana;
    private $desayuno;
    private $entre_comidas;
    private $comida;
    private $cena;

    public function __construct($id_usuario,$dia_semana,$desayuno,$entre_comidas,$comida,$cena){
        $this->setId($id_usuario);
        $this->setDiaSemana($dia_semana);
        $this->setDesayuno($desayuno);
        $this->setEntre_Comidas($entre_comidas);
        $this->setComida($comida);
        $this->setCena($cena);
    }

    public function getId(){
        return $this->id_usuario;
    }
    public function getDiaSemana(){
        return $this->dia_semana;
    }
    public function getDesayuno(){
        return $this->desayuno;
    }
    public function getEntre_Comidas(){
        return $this->entre_comidas;
    }
    public function getComida(){
        return $this->comida;
    }
    public function getCena(){
        return $this->cena;
    }
    
   
    public function setId($id){
      
       $this->id_usuario=$id;
    }
    public function setDiaSemana($dia_semana){
      
        $this->dia_semana=$dia_semana;
     }
     public function setDesayuno($desayuno){
      
        $this->desayuno=$desayuno;
     }
     public function setEntre_Comidas($entre_comidas){
      
        $this->entre_comidas=$entre_comidas;
     }
     public function setComida($comida){
      
        $this->comida=$comida;
     }
     public function setCena($cena){
      
        $this->cena=$cena;
     }
    
   

    public function returnDietasArray(){
        $usuario=array();
        $usuario['id']=$this->getId();
        $usuario['dia_semana']=$this->getDiaSemana();
        $usuario['desayuno']=$this->getDesayuno();
        $usuario['entre_comidas']=$this->getEntre_Comidas();
        $usuario['comida']=$this->getComida();
        $usuario['cena']=$this->getCena();
        return $usuario;
    }

}