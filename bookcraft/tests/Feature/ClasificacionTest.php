<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clasificacion;

class ClasificacionTest extends TestCase
{
    use WithFaker;

    public function test_crear_clasificacion_aleatoria()
    {
        for ($i = 0; $i < 10; $i++) {
            $clasificacion = [
                'clasificacion' => $this->faker->word,
            ];

            $response = $this->postJson(route('clasificacion/new'), $clasificacion);
            $response->assertStatus(200);
            $response->assertSessionHasNoErrors();

            $this->assertDatabaseHas('clasificacion', [
                'clasificacion' => $clasificacion['clasificacion'],
            ]);
        }
    }
}
