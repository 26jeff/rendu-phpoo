<?php

class Ennemi extends Personnage{ // hérite de la classe Personnage

    // attribut de la classe Ennemi
    private $age;

    // constructeur de la classe Ennemi
    function __construct($name, $nbBilles, $age) {
        parent::__construct($name, $nbBilles);
        $this->age = $age;
    }

    // getters et setters de la classe Ennemi
    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

?>