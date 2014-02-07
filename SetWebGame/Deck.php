<?php

include 'Card.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Deck {

    private $cards;
    private $number_of_fields;

    public function __construct($game_difficulty) {
        
        $this->number_of_fields = $game_difficulty;
        
        $classname = 'Card';
        $i = 0;       
        foreach ($classname::$textures as $texture) {
            foreach ($classname::$shapes as $shape) {
                foreach ($classname::$colors as $color) {
                    foreach ($classname::$numbers as $number) {
                        if (!empty($texture) && !empty($shape) && !empty($color) && !empty($number))
                            $this->cards[$i] = new Card($color, $shape, $number, $texture);
                        $i++;
                    }
                }
            }
            if ($this->number_of_fields == 3) {
                break;
            }
        }
        shuffle($this->cards);
    }

    public function get_cards() {
        return $this->cards;
    }

}

