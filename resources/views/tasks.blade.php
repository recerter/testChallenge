@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mi Informacion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('information.updatePassword') }}" enctype="multipart/form-data">
                        @csrf
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

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection