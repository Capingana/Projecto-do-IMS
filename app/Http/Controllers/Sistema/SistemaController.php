<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('Sistema.Admin.usuario.login');
    }

    //    =====================================================

    public function login_submit(Request $request)
    {
        echo "Estou dentro";
    }
}
