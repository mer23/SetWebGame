<?php 
include 'Board.php';
$board = new Board(7, 4);
$deck = $board->get_deck();
$arr = $deck->return_cards();
foreach ($arr as $card) {
    if(!empty($card)) {
        echo $card->get_color() , "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_texture(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_shape(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_number(), "<br>";
    }
}
