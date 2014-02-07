<?php

include 'Deck.php';
include 'Board.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Game {

    private $game_difficulty;
    private $slots_in_board;
    private $deck;
    private $board;

    /* holds the current state of the game, options menu or match */
    private $current_screen;

    /*     * ********************************************************************** */

    /* value for current_screen when the user didn't start the game yet because he/she is still setting up the game options */

    const OPTIONS_MENU_SCREEN = 1;

    /* value for current_screen when the user has already started the match */
    const MATCH_SCREEN = 2;

    /*     * ********************************************************************** */

    public function _construct() {

        $this->game_difficulty = 4;
        $this->slots_in_board = 9;
        $this->current_screen = Game::OPTIONS_MENU_SCREEN;
    }

    //Updates this game's difficulty whenever the user changes its value.
    public function set_difficulty($updated_difficulty) {
        $this->game_difficulty = $updated_difficulty;
    }

    //Updates the number of slots at this game's board whenever the user changes its value.
    public function set_slots_in_board($updated_slots_in_board) {
        $this->slots_in_board = $updated_slots_in_board;
    }

    /* Retrieves this game's deck */

    public function get_deck() {
        if ($this->current_screen == Game::MATCH_SCREEN) {
            return $this->deck;
        }
    }

    /* Retrieves this game's board */

    public function get_board() {
        if ($this->current_screen == Game::MATCH_SCREEN) {
            return $this->board;
        }
    }

    public function deal_cards() {

        /* This function should check for empty slots on this game's board and fill them with 
         * cards from this game's deck (in case there are cards left at the deck. 
         * If not, it leaves the slots empty) */
    }

    /* Starts the game */

    public function init() {

        $this->deck = new Deck($this->game_difficulty);
        $this->board = new Board($this->slots_in_board);

        $this->current_screen = Game::MATCH_SCREEN; //Updates state.
    }

}
