<?php

class Card {

    //Field Color
    public static $colors = ["yellow", "red", "blue"];
    //Field Shape
    public static $shapes = ["diamond", "stadium", "peanut"];
    //Field Number
    public static $numbers = ["1", "2", "3"];
    //Field Texture
    public static $textures = ["filled", "stripped", "empty"];
    
    private $color;
    private $shape;
    private $number;
    private $texture;

    public function __construct($color, $shape, $number, $texture) {
        $this->color = $color;
        $this->number = $number;
        $this->shape = $shape;
        $this->texture = $texture;
    }

    public static function are_equal_cards($card1, $card2) {
        return $card1->color == $card2->color && $card1->shape == $card2->shape &&
                $card1->texture == $card2->texture && $card1->number == $card2->number;
    }

    public static function form_a_set($first_card, $second_card, $third_card) {

        return
        are_consistent_fields($first_card->texture, $second_card->texture, $third_card->texture) &&
        are_consistent_fields($first_card->color, $second_card->color, $third_card->color) &&
        are_consistent_fields($first_card->shape, $second_card->shape, $third_card->shape) &&
        are_consistent_fields($first_card->number, $second_card->number, $third_card->number);
    }

    public static function are_consistent_fields($field_one, $field_two, $field_three) {

        return (field_one == field_two && field_two == field_three) ||
                (field_one != field_two && field_two != field_three);
    }

    public function get_color() {
        return $this->color;
    }

    public function get_shape() {
        return $this->shape;
    }

    public function get_number() {
        return $this->number;
    }

    public function get_texture() {
        return $this->texture;
    }

    public function to_string() {
        return $this->texture + " " + $this->color + " " + $this->shape + " " + $this->number;
    }

}
