<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;

class CategoriaTest extends TestCase
{
    use WithFaker;

    public function test_crear_categoria_aleatoria()
    {
        for ($i = 0; $i < 10; $i++) {

            $categoria = [
                'categoria' => $this->faker->word,
                'estructura' => $this->faker->sentence,
                'audiencia' => $this->faker->numberBetween(1, 100),
            ];

            $response = $this->postJson(route('categoria/new'), $categoria);
            $response->assertStatus(200);
            $response->assertSessionHasNoErrors();

            $this->assertDatabaseHas('categoria', [
                'categoria' => $categoria['categoria'],
                'estructura' => $categoria['estructura'],
                'audiencia' => $categoria['audiencia'],
            ]);
        }
    }
}
