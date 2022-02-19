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
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/products');
        $this->assertCount(1, Product::all());
        $this->assertDatabaseHas('products', ['name' => 'Apple', 'type' => 'Fruit', 'price' => 2.99]);
    }

    public function test_admin_can_see_the_edit_product_page()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();
        $response = $this->actingAs($admin)->get('/products/'. $product->id. '/edit');
        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    public function test_admin_can_update_product()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        Product::factory()->create();
        $this->assertCount(1, Product::all());
        $product = Product::first();
        $response = $this->actingAs($admin)->put('/products/'. $product->id, [
            'name'  => 'Updated Product',
            'type' => 'Test',
            'price' => 4.99
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/products');
        $this->assertEquals('Updated Product', Product::first()->name);
        $this->assertEquals('Test', Product::first()->type);
        $this->assertEquals(4.99, Product::first()->price);
    }

    public function test_admin_can_delete_product()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
       $product =  Product::factory()->create();
       $this->assertEquals(1, Product::count());
       $response = $this->actingAs($admin)->delete('/products/'. $product->id);
       $response->assertStatus(302);
       $this->assertEquals(0, Product::count());
    }
}
