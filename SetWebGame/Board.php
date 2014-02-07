<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Board {
    
    private $number_of_slots;
    
    private $slots;
    
    public function __construct($number_of_slots) {
        
        $this -> number_of_slots = $number_of_slots;
        $this -> slots= array($this -> number_of_slots);
    }
}
