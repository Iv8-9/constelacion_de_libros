<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Libro;

class LibroTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_libro_aleatorio()
    {
        $payload = [
            'id_categoria' => null,
            'id_editorial' => null,
            'id_lector' => null,
            'id_tipo_libro' => null,
            'id_modo_lectura' => null,
            'nombre_libro' => $this->faker->sentence(3),
            'autor' => $this->faker->name,
            'no_paginas' => (string)$this->faker->numberBetween(50, 1000),
            'fecha_publicacion' => $this->faker->date(),
            'imagen' => null,
            'personaje_favorito' => $this->faker->firstName,
            'personaje_odiado' => $this->faker->firstName,
        ];

        $libro = Libro::create([
            'id_categoria' => $payload['id_categoria'],
            'id_editorial' => $payload['id_editorial'],
            'id_lector' => $payload['id_lector'],
            'id_tipo_libro' => $payload['id_tipo_libro'],
            'id_modo_lectura' => $payload['id_modo_lectura'],
            'nombre_libro' => $payload['nombre_libro'],
            'autor' => $payload['autor'],
            'no_paginas' => $payload['no_paginas'],
            'fecha_publicacion' => $payload['fecha_publicacion'],
            'imagen' => $payload['imagen'],
            'personaje_favorito' => $payload['personaje_favorito'],
            'personaje_odiado' => $payload['personaje_odiado'],
        ]);

        $this->assertDatabaseHas('libro', [
            'id' => $libro->id,
            'nombre_libro' => $payload['nombre_libro'],
            'autor' => $payload['autor'],
        ]);
    }
}
