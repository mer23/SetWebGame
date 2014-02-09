<?php

class Card {

    //Field Color
    private static $colors = ['yellow', 'red', 'blue'];
    //Field Shape
    private static $shapes = ['diamond', 'stadium', 'peanut'];
    //Field Number
    private static $numbers = ['1', '2', '3'];
    //Field Texture
    private static $textures = ['filled', 'stripped', 'empty'];
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
                self::are_consistent_fields($first_card->texture, $second_card->texture, $third_card->texture) &&
                self::are_consistent_fields($first_card->color, $second_card->color, $third_card->color) &&
                self::are_consistent_fields($first_card->shape, $second_card->shape, $third_card->shape) &&
                self::are_consistent_fields($first_card->number, $second_card->number, $third_card->number);
    }

    public static function are_consistent_fields($field_one, $field_two, $field_three) {

        return ($field_one == $field_two && $field_two == $field_three) ||
                ($field_one != $field_two && $field_two != $field_three && $field_one != $field_three);
    }

    public static function get_textures() {
        return self::$textures;
    }

    public static function get_colors() {
        return self::$colors;
    }

    public static function get_shapes() {
        return self::$shapes;
    }

    public static function get_numbers() {
        return self::$numbers;
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

    // This shit doesn't work
    public function to_string() {
        return $this->color . ' ' . $this->texture . ' ' . $this->shape . ' ' . $this->number . "<br>";
    }

}
