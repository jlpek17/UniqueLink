@extends ('layouts.app')

@section('title')
    <title>
        Edition Linker
    </title>
@endsection

@section('content')
    <h1> Editer mon Linker </h1>

    <!-- END Row-->
    <div class="row">
        <div class="col">

            <form class="col-4 mx-auto" action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="content">Linker posté le {{ $post->created_at }}</label>
                    <input required type="text" class="form-control" placeholder="Modifier" name="content"
                        value="{{ $post->content }}" id="content">
                </div>


                <button type="submit" class="btn btn-primary">Modifier</button>


            </form>
            
        </div>

    </div> <!-- END Row-->
@endsection
