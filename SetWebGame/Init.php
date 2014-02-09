<?php

include 'Game.php';

$game = new Game();
//$game->set_difficulty(3);
$game->set_slots_in_board(12);
$game->create_match();

$game->init();

$card= new Card(Card::get_colors()[1], Card::get_shapes()[1], Card::get_numbers()[1], Card::get_textures()[2] );
$card2= new Card(Card::get_colors()[2], Card::get_shapes()[0], Card::get_numbers()[1], Card::get_textures()[1] );
$card3= new Card(Card::get_colors()[1], Card::get_shapes()[2], Card::get_numbers()[0], Card::get_textures()[2] );


if (Card::are_consistent_fields($card->get_color(), $card2->get_color(), $card3->get_color())) {
    echo 'TRUE';
}


/* _________________________ DECK DISPLAY _____________________________ */

echo 'DECK: ', '(', sizeof($game->get_deck()->get_cards()), ' cards) <br><br>';
foreach ($game->get_deck()->get_cards() as $card) {
    if (!empty($card)) {
        //echo $card->to_string();
        echo $card->get_color(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_texture(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_shape(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_number(), "<br>";
    } else {
        echo 'EMPTY CARD!<br>';
    }
}
/* ____________________________________________________________________ */


/* _________________________ BOARD DISPLAY ____________________________ */

echo '<br><br>BOARD: ', '(', sizeof($game->get_board()->get_slots()), ' cards) <br><br>';

foreach ($game->get_board()->get_slots() as $slot) {
    if (!empty($slot)) {
        //echo $card->to_string();
        echo $slot->get_color(), "&nbsp;&nbsp;&nbsp;&nbsp;", $slot->get_texture(), "&nbsp;&nbsp;&nbsp;&nbsp;", $slot->get_shape(), "&nbsp;&nbsp;&nbsp;&nbsp;", $slot->get_number(), "<br>";
    } else {
        echo 'EMPTY CARD!<br>';
    }
}
/* ____________________________________________________________________ */

$game->is_there_set();

//Used to show the proper message when comparing cards.
//$boolean_flag = false;
//These two nested for loops compare cards in the deck to make sure they're all different.

    /* for ($i = 0; $i < sizeof($game->get_deck()->get_cards()) - 1; $i++) {

      for ($j = $i + 1; $j < sizeof($game->get_deck()->get_cards()); $j++) {

      if (Card::are_equal_cards($game->get_deck()->get_cards()[$i], $game->get_deck()->get_cards()[$j])) {
      echo 'HOW IS THAT TWO CARDS ARE EQUAL?!<br><br>';
      $boolean_flag = true;
      }
      }
      }
      if (!$boolean_flag) {
      echo "IT'S OK, THEY'RE ALL DIFFERENT!<br><br>";
      } */    
