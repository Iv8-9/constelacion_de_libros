<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Libro;
use App\Models\Clasificacion;
use App\Models\DesLibro;

class DesLibroTest extends TestCase
{
    use WithFaker;

    public function test_crear_descripcion_libro_aleatoria()
    {
        // Crear libro y clasificacion necesarios con models
        $libro = Libro::create([
            'nombre_libro' => $this->faker->sentence(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $clas = Clasificacion::create([
            'clasificacion' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $des = DesLibro::create([
            'id_libro' => $libro->id,
            'id_clasificacion' => $clas->id,
        ]);

        $this->assertDatabaseHas('des_libro', [
            'id' => $des->id,
            'id_libro' => $libro->id,
            'id_clasificacion' => $clas->id,
        ]);
    }
}
