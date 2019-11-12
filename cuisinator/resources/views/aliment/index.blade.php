@section('content')
    <h1>Books</h1>
    @foreach($aliments as $a)
        <div>
            <p>Name: {{$a->nom}}</p>
        </div>
    @endforeach
@endsection

<p>coucou!</p>
