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

        $i = 0;
        foreach (Card::get_textures() as $texture) {
            foreach (Card::get_shapes() as $shape) {
                foreach (Card::get_colors() as $color) {
                    foreach (Card::get_numbers() as $number) {
                        if (!empty($texture) && !empty($shape) && !empty($color) && !empty($number)) {
                            //echo strval($i), '<br>';
                            $this->cards[$i] = new Card($color, $shape, $number, $texture);
                            $i++;
                        }
                    }
                }
            }
            if ($this->number_of_fields == 3) {
                break;
            }
        }

        shuffle($this->cards);
    }

    //Retrieves a non-NULL card from this deck.
    public function draw_card() {

        foreach ($this->cards as $index => $card) {
            if (!empty($card)) {
                $non_null_card = $card;
                unset($this->cards[$index]);
                return $non_null_card;
            }
        }
    }

    public function back_to_deck($card) {

        for ($i = 0; $i < sizeof($this->cards) - 1; $i++) {
            if (empty($this->cards[$i])) {
                $this->cards[$i] = $card;
            }
        }
    }

    public function get_cards() {
        return $this->cards;
    }

}
