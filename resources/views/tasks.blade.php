@extends('layouts.app')

@section('content')
@guest
<script>
    window.onload = function() {
        window.location.href = "{{ route('login') }}";
    }
</script>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar tarea') }}</div>
                    <div class="card-body">
                    <h1>Tareas</h1>

<ul>
    @foreach ($tasks as $task)
        <li>
            {{ $task->name }} - {{ $task->description }}
            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('tasks.create') }}">Agregar tarea</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection