<?php

class Product{

    public $id;
    public $name;
    public $price;
    public $stock;

    public function __construct( $id, $name, $price, $stock)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function __toString()
    {
        return "Name: $this->name, Price: $this->price, Stock: $this->stock";
    }

}