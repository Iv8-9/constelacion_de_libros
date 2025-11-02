<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ModoLectura;

class ModoLecturaTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_modo_lectura_aleatorio()
    {
        $payload = [
            'modo' => $this->faker->word,
        ];

        $modo = ModoLectura::create([
            'modo' => $payload['modo'],
        ]);

        $this->assertDatabaseHas('modo_lectura', [
            'id' => $modo->id,
            'modo' => $payload['modo'],
        ]);
    }
}
