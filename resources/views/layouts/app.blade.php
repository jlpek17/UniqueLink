<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>

    <header>
        @include('layouts.navbar')
    </header>

    <main>
        

        <!-- display message -->
        <div class="container-fluid text-center">

            @if (session()->has('message'))
                <p class="alert alert-success"> {{ session()->get('message') }} </p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')


    </main>

    <footer>
        @include('layouts.footer')
    </footer>

</body>

</html>
