<?php

include 'Game.php';
$game = new Game();
$game->set_difficulty(3);

$game->create_match();

$game->init();

foreach ($game->get_deck()->get_cards() as $card) {
    if (!empty($card)) {
        //echo $card->to_string();
        echo $card->get_color(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_texture(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_shape(), "&nbsp;&nbsp;&nbsp;&nbsp;", $card->get_number(), "<br>";
    } else {
        echo 'EMPTY CARD!<br>';
    }
}

//echo $game->is_there_set();
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
