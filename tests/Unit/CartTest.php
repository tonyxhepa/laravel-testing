<?php

namespace Tests\Unit;

use App\Cart;
use App\Convert;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function test_cart_contents()
    {
        $cart = new Cart(['Apple', 'Dell']);
        $this->assertTrue($cart->has('Apple'));
        $this->assertTrue($cart->has('Dell'));
    }

    public function test_take_one_from_cart()
    {
        $cart = new Cart(['Apple']);
        $this->assertEquals('Apple', $cart->takeOne());
        $this->assertNull($cart->takeOne());
    }

    public function test_price_in_usd()
    {
        $price = new Convert(100);
        $this->assertEquals(113, $price->priceInUsd());
        $this->assertEquals(83, $price->priceInGbp());
        $this->assertEquals(144, $price->priceInCad());
    }
}
