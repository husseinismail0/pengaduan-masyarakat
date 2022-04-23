<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid">
        @auth
            @if ($user->role === 'ADMIN')
                <a class="navbar-brand" href="{{route('dashboard')}}">Halaman Admin</a>
            @endif
            @if ($user->role === 'PETUGAS')
                <a class="navbar-brand" href="{{route('dashboard')}}">Halaman Petugas</a>
            @endif
        @else
        <a class="navbar-brand" href="/">Pengaduan Masyarakat</a>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarSupportedContent">
        <ul class="nav justify-contet">
            @auth
                @if ($user->role === 'PETUGAS')
                    <a style="color:white;" class="nav-link" href="{{route('dashboard')}}">Data Keluhan Masyarakat</a>
                @endif
                @if ($user->role === 'ADMIN')
                    <a style="color:white;" class="nav-link" href="{{route('dashboard')}}">Data Keluhan Masyarakat</a>
                    <a style="color:white;" class="nav-link" href="{{route('user.index')}}">Data User</a>
                @endif
            @else
            <li class="nav-item">
            <a style="color:white;" class="nav-link" href="{{route('detail-keluhan')}}">Daftar Keluhan Masyarakat</a>
            @endauth
            </li>
            @auth
            <li class="nav-item">
            <a style="color:white;" class="nav-link" aria-current="page" href="{{route('logout')}}">logout</a>
            @else
            <li class="nav-item">
            <a style="color:white;" class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
            </li>
            @endauth
        </ul>  
        </div>
    </div>
</nav>