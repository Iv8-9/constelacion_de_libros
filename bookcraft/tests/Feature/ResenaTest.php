<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Libro;
use App\Models\Resena;

class ResenaTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_resena_aleatoria()
    {
        // crear libro primero con model
        $libro = Libro::create([
            'nombre_libro' => $this->faker->sentence(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $payload = [
            'id_libro' => $libro->id,
            'descripcion' => $this->faker->paragraph,
            'frase_favorita' => $this->faker->sentence,
        ];

        $res = Resena::create([
            'id_libro' => $payload['id_libro'],
            'descripcion' => $payload['descripcion'],
            'frase_favorita' => $payload['frase_favorita'],
        ]);

        $this->assertDatabaseHas('resena', [
            'id_libro' => $libro->id,
            'descripcion' => $payload['descripcion'],
        ]);
    }
}
