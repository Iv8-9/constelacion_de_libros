<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estatus;

class EstatusTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_estatus_aleatorio()
    {
        $payload = [
            'estatus' => $this->faker->word,
        ];

        $estatus = Estatus::create([
            'estatus' => $payload['estatus'],
        ]);

        $this->assertDatabaseHas('estatus', [
            'id' => $estatus->id,
            'estatus' => $payload['estatus'],
        ]);
    }
}
