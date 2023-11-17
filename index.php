<?php

//importation des classes et des tableaux
require 'Personnage.php';
require 'Hero.php';
require 'Ennemi.php';
require 'Tableaux.php';
require 'Game.php';

$game = New Game($difficultes, $heros, $nomEnnemi); //instanciation de la classe Game
$game->Scenario(); //appel de la méthode Scenario
?>

