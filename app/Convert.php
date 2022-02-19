<?php

namespace App;

class Convert
{
protected $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function priceInUsd()
    {
        return round($this->price * 1.13, 2);
    }
    public function priceInGbp()
    {
        return round($this->price * 0.83, 2);
    }
    public function priceInCad()
    {
        return round($this->price * 1.44, 2);
    }
}
