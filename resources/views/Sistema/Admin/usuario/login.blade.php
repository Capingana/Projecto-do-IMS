@extends('Sistema.Admin.templates.pagina1')
@section('conteudo')

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4 offset-sm-4">
                <h4>Login</h4>
                <hr>
                {{-- Form --}}
                <form action="{{ route('login_submit') }}" method="post">

                    @csrf
                    <div class="form-group">
                        <label for="">Usuário</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </div>
                </form>
                {{-- /form --}}
            </div>
        </div>
    </div>
@endsection
