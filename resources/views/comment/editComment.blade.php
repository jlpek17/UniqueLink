@extends ('layouts.app')

@section('title')
    <title>
        Edition Commentaire
    </title>
@endsection

@section('content')
    <h1> Editer mon commentaire </h1>

    <!-- END Row-->
    <div class="row">
        <div class="col">

            <form class="col-4 mx-auto" action="{{ route('comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="content">Commentaire posté le {{ $comment->created_at }}</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="content"
                        value="{{ $comment->content }}" id="content">
                </div>


                <button type="submit" class="btn btn-primary">Modifier</button>


            </form>
            
        </div>

    </div> <!-- END Row-->
@endsection
