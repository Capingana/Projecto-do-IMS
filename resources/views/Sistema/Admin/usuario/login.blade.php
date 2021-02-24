@extends('Sistema.Admin.templates.pagina1')
@section('conteudo')

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4 offset-sm-4">
                <h4>Login</h4>
                <hr>
                {{-- Form --}}
                <form action="{{ route('login_submit') }}" method="post">
                    {{-- csrf --}}
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
                        <input type="reset" value="Limpar" class="btn btn-danger">
                    </div>
                </form>
                {{-- /form --}}
                {{-- Mostrando o erro dos inputs --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $mensagem)
                                <li>{{ $mensagem }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div>
            {{-- Erros de login --}}
            @if (isset($erro))
                <div class="alert alert-danger text-center">{{ $erro }}</div>

            @endif
        </div>
    </div>
@endsection
