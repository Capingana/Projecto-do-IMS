<div class="container-fluid bg-dark text-white">
    <div class="row">
        <div class="col-6 p-3">[SISTEMA]</div>
        <div class="col-6 text-right p-3">{{ session('usuario')['usuario'] }} | <a
                href="{{ route('logout') }}">LogOut</a></div>
    </div>
</div>
