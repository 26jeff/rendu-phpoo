<?php

  class Personnage {
    // attributs de la classe Personnage
    protected $name; 
    protected $nbBilles;

    // constructeur de la classe Personnage
    function __construct($name, $nbBilles) {
        $this->name = $name;
        $this->nbBilles = $nbBilles;
    }

    // getters et setters de la classe Personnage
    public function getName() {
        return $this->name;
    } 
    
    public function setName() {
        return $this->name = $name;
    } 

    public function getNbBilles() {
        return $this->nbBilles;
    }

    public function setNbBilles($nbBilles) {
        $this->nbBilles = $nbBilles;
    }
}

?>