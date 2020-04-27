<nav class="navbar navbar-expand-lg main-navbar navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://pbs.twimg.com/profile_images/848467042474704899/BOkOCZhd_400x400.jpg" width="30" height="30" alt="{{ config('app.name', 'Laravel') }}">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/lowongan') }}">{{ __('Lowongan') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/agenda') }}">{{ __('Agenda') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pengumuman') }}">{{ __('Pengumuman') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/produk-siswa') }}">{{ __('Produk Siswa') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/artikel') }}">{{ __('Artikel') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/faq') }}">{{ __('FAQ') }}</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success px-3 py-1 rounded-0" href="{{ url('/portal/perusahaan') }}">
                            {{ __('Perusahaan') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @role('perusahaan')
                                <a class="dropdown-item" href="{{ url('/perusahaan') }}">Dasbhboard</a>
                            @endrole
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>