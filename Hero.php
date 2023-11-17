<?php

class Hero extends Personnage { // hérite de la classe Personnage
    
    // attributs de la classe Hero
    private $bonus; 
    private $malus; 
    private $criDeGuerre;

    // constructeur de la classe Hero
    public function __construct($name, $nbBilles, $bonus, $malus, $criDeGuerre) {   
        parent::__construct($name, $nbBilles);
        $this->bonus = $bonus;
        $this->malus = $malus;
        $this->criDeGuerre = $criDeGuerre;
    }
    
    // getters et setters de la classe Hero
    public function getBonus() {
        return $this->bonus;
    }

    public function setBonus($bonus) {
        $this->bonus = $bonus;
    }

    public function getMalus() {
        return $this->malus;
    } 

    public function setMalus($malus) {
        $this->malus = $malus;
    }

    public function getCriDeGuerre() {
        return $this->criDeGuerre;
    }

    public function setCriDeGuerre($criDeGuerre) {
        $this->criDeGuerre = $criDeGuerre;
    }

    // méthodes de la classe Hero
    public function choixPairImpair() { // méthode qui permet de choisir pair ou impair
        if (rand(0, 1) == 0) { // si le nombre aléatoire est égal à 0, le joueur choisi pair
            echo  $this->name." choisi pair ! <br>"; 
            return 0; 
        } else { // sinon, le joueur choisi impair
            echo  $this->name." choisi impair ! <br>";
            return 1;
        }
    }

    public function gagner($ennemi) { // méthode qui developpe le cas où le joueur gagne
        echo $ennemi->getName()." avait bien cette mise dans la main. <br>".$this->name." gagne ! <br> Il prend ".$ennemi->getNbBilles()." billes à l'adversaire et se voit offrir en bonus ".$this->bonus." billes. <br>Il s'exclame : ".$this->criDeGuerre."<br><br>";
        $this->nbBilles += ($ennemi->getNbBilles() + $this->bonus); // le joueur gagne le nombre de billes de l'ennemi + le bonus
    }

    public function perdre($ennemi) { // méthode qui developpe le cas où le joueur perd
        echo $ennemi->getName()." avait choisi l'inverse. <br>".$this->name." perd ! <br> Il donne ".$ennemi->getNbBilles()." billes à l'adversaire et se voit voler en malus ".$this->malus." billes. <br> Il s'en va dépitée chercher un autre ennemi. <br><br>";
        $this->nbBilles -= ($ennemi->getNbBilles() + $this->malus); // le joueur perd le nombre de billes que l'ennemi a misé + le malus
    }
}

?>