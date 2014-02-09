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

        $this->number_of_slots = $number_of_slots;
        $this->slots = array_fill(0, $this->number_of_slots, NULL);
    }

    public function get_slots() {
        return $this->slots;
    }

    public function card_to_slot($index, $card) {

        if (empty($this->slots[$index])) {
            $this->slots[$index] = $card;
        }
    }

}
