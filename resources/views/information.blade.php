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
                <div class="card-header">{{ __('Mi Informacion') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('information.updatePhoto') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Imagen de perfil') }}</label>
                        <div class="col-md-6">
                        <img src="{{ Auth::user()->photo }}" alt="" height="50" >
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                        </div>
                        @error('profile_picture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                            </div>
                    </div>
                </form>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('information.updateName') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', Auth::user()->lastname) }}">
                            </div>
                        </div>

                        @if (session('successName'))
                            <div class="alert alert-success">
                                {{ session('successName') }}
                            </div>
                        @endif
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                        </div>
                    </form>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('information.updatePassword') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña actual') }}</label>

                            <div class="col-md-6">
                            <input type="password" name="current_password" id="current_password" class="form-control" required>

                                @if ($errors->has('current_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('Nueva contraseña') }}</label>

                            <div class="col-md-6">
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                            </div>
                        </div>

                        @if (session('successPassword'))
                            <div class="alert alert-success">
                                {{ session('successPassword') }}
                            </div>
                        @endif
                        @if ($errors->has('current_password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('current_password') }}
                            </div>
                        @endif
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                        </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endguest
@endsection