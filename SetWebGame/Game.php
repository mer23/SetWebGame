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

    /* holds the current state of the game: options menu, list of matches or game table */
    private $current_screen = Game::OPTIONS_MENU;

    const DEFAULT_DIFFICULTY = 4;
    const DEFAULT_SLOTS_IN_BOARD = 9;

    /* ----------------------------------------------------------------------------- */
    const OPTIONS_MENU = 1; /* the user didn't create the game yet */
    const LIST_OF_MATCHES = 2; /* the user awaits for other players to join his game */
    const GAME_TABLE = 3; /* the game has already started */

    /* ----------------------------------------------------------------------------- */

    public function _construct() {

        $this->game_difficulty = Game::DEFAULT_DIFFICULTY;
        $this->slots_in_board = Game::DEFAULT_SLOTS_IN_BOARD;

        //Why isn't this working here??
        // $this->current_screen = Game::OPTIONS_MENU;
    }

    //Updates this game's difficulty whenever the user changes its value.
    public function set_difficulty($updated_difficulty) {

        if ($this->current_screen == Game::OPTIONS_MENU) {
            $this->game_difficulty = $updated_difficulty;
        }
    }

    //Updates the number of slots at this game's board whenever the user changes its value.
    public function set_slots_in_board($updated_slots_in_board) {

        if ($this->current_screen == Game::OPTIONS_MENU) {
            $this->slots_in_board = $updated_slots_in_board;
        }
    }

    public function get_current_screen() {
        return $this->current_screen;
    }

    /* Retrieves this game's deck */

    public function get_deck() {

        if ($this->current_screen == Game::GAME_TABLE) {
            return $this->deck;
        }
    }

    /* Retrieves this game's board */

    public function get_board() {

        if ($this->current_screen == Game::GAME_TABLE) {
            return $this->board;
        }
    }

    /* Allocates a card from the deck on each empty slot at board */

    public function fill_board() {

        foreach ($this->get_board()->get_slots() as $slot) {
            if (empty($slot)) {
                $this->deal_card($slot);
            }
        }
    }

    /* Deals a card from the deck to the board (empty)slot passed as parameter. */

    public function deal_card($empty_slot) {

        $empty_slot = $this->get_deck()->draw_card();
    }

    public function cards_to_deck() {
        
    }

    public function is_there_set() {

        $arr = $this->board->get_slots();
        $counter = 0;

        for ($i = 0; $i < count($arr); $i++) { //find the first card
            echo'first for<br>';
            if (!empty($arr[$i])) {
                for ($j = $i + 1; $j < count($arr); $j++) { //finds the second card
                    if (!empty($arr[$j])) {
                        for ($k = $j + 1; $k < count($arr); $k++) { //find the third card
                            if (!empty($arr[$k])) {
                                if (Card::form_a_set($arr[$i], $arr[$j], $arr[$k]) && false) { //checks if they make a set
                                    return true;
                                }
                                $counter++;
                            }
                        }
                    }
                }
            }
        }

        return $counter;
    }

    public function pause() {
        /* This has to retreat all cards from board and put them back in deck.
         * Then, the deck has to be shuffled. When unpaused, new cards will be dealt 
         * at the board so the game can continue.
         * Only one pause per user per match shall be allowed.
         */
    }

    public function unpause() {
        
    }

    /* Passes to next screen */

    public function create_match() {

        if ($this->current_screen == Game::OPTIONS_MENU) {
            $this->current_screen = Game::LIST_OF_MATCHES;
        }
    }

    /* Starts the game */

    public function init() {

        if ($this->current_screen == Game::LIST_OF_MATCHES) {
            $this->deck = new Deck($this->game_difficulty);
            $this->board = new Board($this->slots_in_board);

            $this->current_screen = Game::GAME_TABLE;

            $this->fill_board();
        }
    }

}
