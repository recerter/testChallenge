@extends('layouts.app')

@section('content')
    <h1>Agregar tarea</h1>

    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Nombre de la tarea:</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="description">Descripción de la tarea:</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <button type="submit">Agregar tarea</button>
    </form>
@endsection