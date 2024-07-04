<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <!-- element on leftside of the navbar -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="" src="/images/logo.svg" height="75">UniqueLink
        </a>

        <!-- hamburger button for small screen -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- link-container of the navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- element on leftside of the navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}"><span class="material-symbols-rounded">
                        home
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>

        
            
            <!-- element on rightside of the navbar -->

            @guest
            <!-- on affiche aucune information à droit concernant la connexionsi aucun 'user' connecté -->
            @else
            <form action="{{ route('search') }}" method="GET" class="d-flex ms-auto" role="search">
                <input class="form-control me-3" type="search" name="query" placeholder="taper mot, expression, personne, ..." aria-label="Champ de recherche" style="width: 256px;">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('Connecté') }} en tant que : {{ Auth::user()->pseudo }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            
                            <a class="dropdown-item" href="{{ route('users.edit', $user = Auth::user()) }}">Modifier mes informations</a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @endguest

        </div>

    </div>
</nav>