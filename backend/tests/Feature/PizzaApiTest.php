<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pizza;

class PizzaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_200()
    {
        $response = $this->getJson('/api/pizzas');

        $response->assertStatus(200);
    }

    public function test_index_returns_pizzas()
    {
        Pizza::factory()->create([
            'name' => 'Margherita',
            'price' => 2500
        ]);

        $response = $this->getJson('/api/pizzas');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Margherita'
            ]);
    }

    public function test_show_returns_single_pizza()
    {
        $pizza = Pizza::factory()->create([
            'name' => 'Pepperoni'
        ]);

        $response = $this->getJson("/api/pizzas/{$pizza->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Pepperoni'
            ]);
    }

    public function test_show_returns_404_if_not_found()
    {
        $response = $this->getJson('/api/pizzas/999');

        $response->assertStatus(404);
    }
}
