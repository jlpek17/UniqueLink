@extends ('layouts.app')

@section('title')
    <title>
        Resultat de recherche
    </title>
@endsection

@section('content')
    <h1 class="text-center"> Resultat de recherche pour "<u>{{ $query }}</u>"</h1>

    <!-- END Row-->
    <div class="row">
        <div class="col">
            
            @if (count($searchResult) == 0)
            <p> Aucun Resultat </p>     
            @endif
            @foreach ($searchResult as $index => $Result)
            <h3>Resultat n°{{ $index +1 }}</h3> 
            <p>{{$Result->content }}</p>
            <hr>
            @endforeach
            {{-- {{ $searchResult->links() }} --}}
            {{ $searchResult->withQueryString()->links() }}
        </div>

    </div> <!-- END Row-->
@endsection
