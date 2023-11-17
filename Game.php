<?php

class Game{

    // attributs de la classe Game initialisés dans le constructeur
    private $difficultes; // tableau de difficultés
    private $heros; // tableau de héros
    private $nomEnnemi; // tableau de noms d'ennemis

    // attributs de la classe Game utilisés dans les méthodes
    private $ennemis; // tableau d'ennemis
    private $difficulteActuelle; // difficulté actuelle
    private $hero; // héros choisi

    // constructeur de la classe Game
    public function __construct($difficultes, $heros, $nomEnnemi) {
        $this->difficultes = $difficultes;
        $this->heros = $heros;
        $this->nomEnnemi = $nomEnnemi;
    }

    //méthodes de la classe Game
    public function choixDifficultes() { // méthode qui permet de choisir la difficulté
        $this->difficulteActuelle = $this->difficultes[rand(0, count($this->difficultes) - 1)]; //a partir tu tableau de difficultés, on choisi une difficulté aléatoire
    } 

    private function choixHero() { // méthode qui permet de choisir le héros
        $this->hero = $this->heros[rand(0, count($this->heros) - 1)]; //a partir tu tableau de héros, on choisi un héros aléatoire
    }

    private function creerEnnemi() { // méthode qui permet de créer les ennemis
        $i = 0; // initialisation d'un compteur
        while ( $i < ($this->difficulteActuelle-1)) { // tant que le compteur est inférieur à la difficulté actuelle
            $this->ennemis[] = new Ennemi($this->nomEnnemi[$i], rand(1, 20), rand(1, 100)); // on ajoute un ennemi au tableau d'ennemis, avec un nom issu de la liste de noms d'ennemis, un nombre de billes aléatoire entre 1 et 20 et un age aléatoire entre 1 et 100
            $i++; // on incrémente le compteur
        }
    }

    // méthode qui développe le scénario du jeu
    public function Scenario(){
        $this->choixDifficultes(); // on choisi la difficulté
        $this->choixHero(); // on choisi le héros
        $this->creerEnnemi(); // on crée les ennemis en fonction de la difficulté
        echo "Le joueur choisi est ".$this->hero->getName()." et il fera face à ".$this->difficulteActuelle." ennemis. <br>Le jeu commence ! <br><br>";
        $i = 0; // initialisation d'un compteur
        foreach ($this->ennemis as $ennemi){ // pour chaque ennemi
            echo $this->hero->getName()." affronte ".$ennemi->getName()."<br>".$this->hero->getName()." a ".$this->hero->getNbBilles()." billes. <br>"; 
            if ($ennemi->getAge() > 70 and rand(0, 1) == 1) { // si l'ennemi a plus de 70 ans et que le hero tente de tricher, il a une chance sur 2 de gagner et on incrémente le compteur
                echo $this->hero->getName()." tente de tricher et ".$ennemi->getName()." est trop vieux et ne voit rien.<br> Le jeu se fait et bizarrement.. <br>";
                $this->hero->gagner($ennemi); 
                $i++; 
            } else {
                if ($this->hero->choixPairImpair() == $ennemi->getNbBilles() % 2) { // si le choix du heros (pair ou impair) est egal au choix de l'ennemi (grace au modulo 2) alors le héros gagne et on incrémente le compteur
                    $this->hero->gagner($ennemi); 
                    $i++; 
                } else { 
                    $this->hero->perdre($ennemi); // sinon, le héros perd et on incrémente le compteur
                    $i++;
                } 
            }           
            if ($i == ($this->difficulteActuelle-1)) { // si le compteur atteint le nombre d'ennemis affrontés alors le hero remporte la partie
                echo "Le dernier ennemi viens de mourrir. ".$this->hero->getName()." remporte 45,6 milliards de Won sud-coréen. !";
                return;
            } 
            if ($this->hero->getNbBilles() <= 0){ // si le héros n'a plus de billes, il perd la partie
                echo $this->hero->getName()." n'a plus aucune billes. Les arbitres se rapproche de lui et l'achève d'une balle dans la tête.";
                return;
            }
        }
    }
}