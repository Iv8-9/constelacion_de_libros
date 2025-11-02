<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Editorial;

class EditorialTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_editorial_aleatoria()
    {
        $payload = [
            'nombre_editorial' => $this->faker->company,
            'calle' => $this->faker->streetName,
            'noExt' => $this->faker->numberBetween(1, 1000),
            'colonia' => $this->faker->city,
        ];

        Editorial::create([
            'nombre_editorial' => $payload['nombre_editorial'],
            'calle' => $payload['calle'],
            'noExt' => $payload['noExt'],
            'colonia' => $payload['colonia'],
        ]);

        $this->assertDatabaseHas('editorial', [
            'nombre_editorial' => $payload['nombre_editorial'],
            'calle' => $payload['calle'],
            'noExt' => $payload['noExt'],
            'colonia' => $payload['colonia'],
        ]);
    }
}
