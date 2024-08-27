<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_getAll_products(): void
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'price', 'description', 'group_id', 'created_at', 'updated_at'],
            ]);
    }
    public function test_getById_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->get("/api/products/{$product->id}");
        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'group_id' => $product->group_id,
            ]);
    }
}
