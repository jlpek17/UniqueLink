@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    @section('title')
    <title>
        Bienvenue sur uniqueLink
    </title>
    @endsection
    </head>

    <body>
            <header>
            </header>

            <main>
                @section('content')
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            @guest
                                <a class="btn btn-primary" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>

                                <a class="btn btn-success" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            @else
                            <a class="btn btn-primary" href="{{ route('home') }}">
                                Entrez
                            </a>
                            @endguest
                        </div>
                    </div>
                @endsection
            </main>

            <footer>

            </footer>
    </body>
</html>
