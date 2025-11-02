<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PruebaUsuarioTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_registrarse_con_datos_aleatorios()
    {
        $password = $this->faker->password(8);

        $usuario = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => $password,
            'app_lector' => $this->faker->lastName,
            'apm_lector' => $this->faker->lastName,
            'edad' => $this->faker->numberBetween(1, 100),
            'fecha_nacimiento' => $this->faker->date(),
            'suscripcion' => $this->faker->boolean,
        ];

        $response = $this->post(route('register'), $usuario);

        $response->assertRedirect('/home'); 
        

        $this->assertDatabaseHas('users', [
            'name' => $usuario['name'],
            'email' => $usuario['email'],
            'app_lector' => $usuario['app_lector'],
            'apm_lector' => $usuario['apm_lector'],
            'edad' => $usuario['edad']
        ]);

        $usuarioCreado = Usuario::where('email', $usuario['email'])->first();
        $this->assertNotNull($usuarioCreado);
        $this->assertTrue(Hash::check($password, $usuarioCreado->password));
    }
}
