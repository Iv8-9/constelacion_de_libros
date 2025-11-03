<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Libro;

class LibroTest extends TestCase
{
    use WithFaker;

    public function test_crear_libro_aleatorio()
    {
        for ($i = 0; $i < 10; $i++) {
            $libro = [
                'id_lector' => 3,
                'nombre_libro' => $this->faker->sentence(3),
                'autor' => $this->faker->name,
                'genero' => $this->faker->sentence(3),
                'no_paginas' => (string)$this->faker->numberBetween(50, 1000),
                'fecha_termino' => $this->faker->date(),
                'imagen' => "https://m.media-amazon.com/images/I/719Clw-CptS._SL1000_.jpg",
                'personaje_favorito' => $this->faker->firstName,
                'personaje_odiado' => $this->faker->firstName,
                'tipo_libro' => $this->faker->sentence(),
                'modo_lectura' => $this->faker->sentence(),
            ];

            $response = $this->postJson(route('libro/new'), $libro);
            $response->assertStatus(200);
            $response->assertSessionHasNoErrors();

            $this->assertDatabaseHas('libro', [
                'id_lector' => $libro['id_lector'],
                'nombre_libro' => $libro['nombre_libro'],
                'autor' => $libro['autor'],
                'genero' => $libro['genero'],
                'no_paginas' => $libro['no_paginas'],
                'fecha_termino' => $libro['fecha_termino'],
                'imagen' => $libro['imagen'],
                'personaje_favorito' => $libro['personaje_favorito'],
                'personaje_odiado' => $libro['personaje_odiado'],
                'tipo_libro' => $libro['tipo_libro'],
                'modo_lectura' => $libro['modo_lectura'],
            ]);
        }
    }
}
