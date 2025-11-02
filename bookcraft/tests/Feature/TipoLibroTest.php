<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TipoLibro;

class TipoLibroTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_tipo_libro_aleatorio()
    {
        $payload = [
            'tipo' => $this->faker->word,
        ];

        $tipo = TipoLibro::create([
            'tipo' => $payload['tipo'],
        ]);

        $this->assertDatabaseHas('tipo_libro', [
            'id' => $tipo->id,
            'tipo' => $payload['tipo'],
        ]);
    }
}
