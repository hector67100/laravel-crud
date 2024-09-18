
@foreach($Listas as $product)
    <div>
        <h3>{{ $product->tarea }}</h3>
        <a href="{{ url('listas/'.$product->id.'/edit') }}">Edit</a>
        <form action="{{ url('listas/'.$product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
