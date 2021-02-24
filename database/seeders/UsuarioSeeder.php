<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modelos\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuario = new Usuario;
        $usuario->usuario = 'user@gmail.com';
        // EnCriptografando a senha
        $usuario->senha = Hash::make('capingana');
        $usuario->save();
    }
}
