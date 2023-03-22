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
                        <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Agregar Tarea</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection