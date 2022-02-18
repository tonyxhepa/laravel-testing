<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_store_new_product()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/products', [
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 2.99
        ]);

        $response->assertRedirect('/products');
        $this->assertCount(1, Product::all());
        $this->assertDatabaseHas('products', ['name' => 'Apple', 'type' => 'Fruit', 'price' => 2.99]);
    }
}
