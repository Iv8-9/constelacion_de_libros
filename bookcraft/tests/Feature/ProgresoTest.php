<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProgresoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crear_progreso_aleatorio()
    {
        // crear libro y estatus necesarios
        $libroId = DB::table('libro')->insertGetId([
            'nombre_libro' => $this->faker->sentence(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $estatusId = DB::table('estatus')->insertGetId([
            'estatus' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $payload = [
            'id_libro' => $libroId,
            'id_estatus' => $estatusId,
        ];

        // note: in routes api.php the route is named 'progeso/new' (typo)
        $response = $this->postJson('/api/progeso/new', $payload);
        $response->assertStatus(200);

        $this->assertDatabaseHas('progreso', [
            'id_libro' => $libroId,
            'id_estatus' => $estatusId,
        ]);
    }
}
