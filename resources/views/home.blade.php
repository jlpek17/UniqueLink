@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Connectés!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

        <!-- WELCOME -->
        <div class="container">
            <div class="row m-3 justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <img class="" src="images/logo.svg">
                    </div>
                    <h1 class="text-center"> Bienvenue sur uniqueLink </h1>
                </div>
            </div>
        </div>

        <!-- END OF WELCOME -->

        <!-- POST -->
        <div class="container">
            <div class="row m-3 justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Poster un Linker</div>

                        <div class="card-body">
                            {{-- <form action="{{ route(posts.store, $post)}}" method="POST"> --}}
                            <form action="{{ route('posts.store')}}" method="POST">
                                @csrf
                                <div class="input-group m-2">
                                    <span class="input-group-text">Ecrit ton linker</span>
                                    <textarea class="form-control" aria-label="Contenu" name="content"></textarea>
                                </div>

                                <div class="input-group m-2">
                                    <input type="file" class="form-control" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">X</button>
                                </div>

                                <div class="input-group m-2">
                                    <input type="text" class="form-control" name="tags" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>

                                <input name="id" value="{{ Auth::user()->id }}">
                                
                                <button class="btn btn-outline-secondary" type="submit">Linker</button>


                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>    
        <!-- END OF POST -->


        <!-- ALL POSTED LINKER -->
        <div class="container">
            <div class="row m-3 justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Tous les linker</div>

                        <div class="card-body">


                        </div>

                    </div>
                </div>
            </div>
        </div>    
        <!-- END OF ALL POSTED LINKER -->





            </div>
        </div>
    </div>
</div>
@endsection
