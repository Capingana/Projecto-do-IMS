<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Modelos\Usuario;
use Illuminate\Support\Facades\Hash;

class SistemaController extends Controller
{
    //    =====================================================
    public function index()
    {
        //Verifica se o usuário está ou não logado
        if (Session()->has('usuario')) {
            echo "Logado";
        } else {

            return redirect()->route('login');
        }
    }
    //    =====================================================
    public function login()
    {
        $erro = session('erro');
        $data = [];
        if (!empty($erro)) {
            $data = [
                'erro' => $erro
            ];
        }

        return view('Sistema.Admin.usuario.login');
    }

    //    =====================================================

    public function login_submit(LoginRequest $request)
    {
        // Validação de dados
        $request->validated();

        //    Verificando dados do login
        $usuario = trim($request->input('email'));
        $senha = trim($request->input('password'));

        $usuario = Usuario::where('usuario', $usuario)->first();
        // Verificando se existe email

        if (!$usuario) {
            session()->flash('erro', 'Este Usuário não existe.');
            return redirect()->route('login');
        }
        // Verificando a senha correcta
        if (Hash::check($senha, $usuario->senha)) {
            echo "OK";
        } else {
            echo "NOT OK";
        }
    }



    //    =====================================================
    // public function temp()
    // {
    //     $usuario = new Usuario;
    //     $usuario->usuario = 'admin@gmail.com';
    //     // EnCriptografando a senha
    //     $usuario->senha = Hash::make('admin');
    //     $usuario->save();
    //     echo 'Terminado';
    // }
}
