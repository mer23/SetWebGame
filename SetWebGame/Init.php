<?php 
include 'Game.php';
$game = new Game();
$game -> init();

foreach ($game -> get_deck() -> get_cards() as $card) {
    if(!empty($card)) {
        echo $card->get_color() , "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_texture(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_shape(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_number(), "<br>";
    }
}
