@extends('layouts.app')

@section('content')

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

    <!-- END WELCOME -->

    <!-- TO POST LINKER -->
    <div class="container">
        <div class="row m-3 justify-content-center">
                <div class="card p-2 poster">

                    <div class="card-body p-2">
                        {{-- <form action="{{ route(posts.store, $post)}}" method="POST"> --}}
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input-group m-2">
                                <span class="input-group-text"><b>Ecrit ton linker :</b></span>
                                <textarea class="form-control" aria-label="Contenu" name="content"></textarea>
                            </div>

                            <div class="input-group m-2">
                                <input type="file" class="form-control" id="image" name="image"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <button class="btn btn-light" type="button"
                                    id="inputGroupFileAddon04"><b>X</b></button>
                            </div>

                            <div class="input-group m-2">
                                <span class="input-group-text"><b>Ajoute des Tags :</b></span>
                                <input type="text" class="form-control" name="tags" id="tags"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>

                            <div class="text-center">
                                <button class="btn btn-dark" type="submit">
                                    <span class="material-symbols-rounded">publish</span>Lache ton Linker
                                </button>

                            </div>

                        </form>

                    </div>

                </div>
        </div>
    </div>
    <!-- END TO POST -->


    <!-- ALL POSTED LINKER -->
    <div class="container">
        <div class="row m-3 justify-content-center">

                @foreach ($posts as $post)
                    <div class="card linker">
                        <h2>Linker de {{ $post->user->pseudo }}</h2>
                        <p id="linkerContent">""{{ $post->content }}""<b># Tags:</b> {{ $post->tags }} <b># Auteur:
                            </b>{{ $post->user->pseudo }}</p>
                        <a class="text-center"><img src="images/{{ $post->image }}" height="128px"></a>

                        <div class="d-flex buttonLinker">
                            @can('update', $post)
                            <a class="btn btn-dark modifyLinker" href="{{ route('posts.edit', $post) }}">
                                <button class="btn btn-dark modifyLinkerOn">
                                    <span class="material-symbols-rounded">published_with_changes</span>Modifier le Linker
                                </button>
                            </a>
                            @endcan
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('delete')
                                @can('delete', $post)
                                <a class="btn btn-dark modifyLinker">
                                    <button class="btn btn-dark modifyLinkerOn">
                                        <span class="material-symbols-rounded">delete</span>Supprimer le Linker
                                    </button>
                                </a>
                                @endcan
                            </form>
                        </div>

                        <div class="row commentSection">
                            @foreach ($post->comments as $comment)
                                <div class="card container commentBox" style="width: 320px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><u>{{ $comment->user->pseudo }}</u> a commenté:</h5>
                                        <p class="card-text">{{ $comment->content }}</p>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">#{{ $comment->tags }}</h6>

                                        <div class="d-flex buttonLinker">
                                            <!-- check policies in order to display the button -->
                                            <a class="btn" href="{{ route('comments.edit', $comment) }}">
                                                @can('update', $comment)
                                                <button class="btn btn-light modifyLinkerOn">
                                                    <span
                                                        class="material-symbols-rounded">published_with_changes</span>Modifier
                                                </button>
                                                @endcan

                                            <!-- check policies in order to display the button -->
                                            </a>
                                            <form action="{{ route('comments.destroy', $comment, $post) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn">
                                                    @can('delete', $comment)
                                                    <button type="submit" class="btn btn-light modifyLinkerOn">
                                                        <span
                                                            class="material-symbols-rounded">published_with_changes</span>Supprimer
                                                    </button>
                                                    @endcan
                                                </a>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf

                            <div class="form-floating commentBox">
                                <textarea class="form-control" placeholder="Leave a comment here" name="content" id="content" style="height: 96px"></textarea>
                                <label for="content">Ecrire un commentaire</label>

                            </div>

                            <div class="form-floating commentBox">
                                <textarea class="form-control" placeholder="Leave a tags here" name="tags" id="tags" style="height: 48px"></textarea>
                                <label for="content">Associe tes #Tags</label>
                            </div>

                            
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-dark">Commenter le linker</button>
                            

                        </form>

                    </div>
                @endforeach

                {{ $posts->links() }}
        </div>
    </div>
    <!-- END ALL POSTED -->
@endsection
