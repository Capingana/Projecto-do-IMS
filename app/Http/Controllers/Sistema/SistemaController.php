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
        if ($this->checkSession()) {
            return redirect()->route('home');
        } else {

            return redirect()->route('login');
        }
    }
    //    =====================================================

    private function checkSession()
    {
        return session()->has('usuario');
    }
    //    =====================================================
    public function login()
    {
        // Verificar se já existe sessão
        if ($this->checkSession()) {
            return redirect()->route('index');
        }


        $erro = session('erro');
        $data = [];
        if (!empty($erro)) {
            $data = [
                'erro' => $erro
            ];
        }

        return view('Sistema.Admin.usuario.login', $data);
    }

    //    =====================================================

    public function login_submit(LoginRequest $request)
    {

        // verifica se houve submissão de formulário
        if (!$request->isMethod('post')) {
            return redirect()->route('index');
        }


        // Verificar se já existe sessão
        if ($this->checkSession()) {
            return redirect()->route('index');
        }


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
        if (!Hash::check($senha, $usuario->senha)) {
            session()->flash('erro', 'Senha inválida.');
            return redirect()->route('login');
        }
        session()->put('usuario', $usuario);
        return redirect()->route('index');
    }
    //    =====================================================
    // Sair da página
    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('index');
    }
    //    =====================================================
    // Entrar na aplicação principal
    public function home()
    {
        if (!$this->checkSession()) {
            return redirect()->route('login');
        }

        return view('sistema.home');
    }

    //    =====================================================


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
