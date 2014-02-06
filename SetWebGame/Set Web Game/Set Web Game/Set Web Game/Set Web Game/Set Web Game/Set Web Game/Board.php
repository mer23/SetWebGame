<?php
    include 'Deck.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Board {
    
    private $deck;
    private $number_of_slots;
    
    public function __construct($number_of_slots, $game_difficulty) {
        $this->number_of_slots = $number_of_slots;
        $this->deck = new Deck($game_difficulty);
    }
    
    public function get_deck() {
        return $this->deck;
    }
    
}
