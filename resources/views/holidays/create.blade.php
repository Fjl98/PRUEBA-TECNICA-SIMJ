@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Día Festivo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('holidays.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="color" class="form-control" id="color" name="color" value="{{ old('color') }}" required>
        </div>
        <div class="form-group">
            <label for="dia">Día</label>
            <input type="number" class="form-control" id="dia" name="dia" value="{{ old('dia') }}" required>
        </div>
        <div class="form-group">
            <label for="mes">Mes</label>
            <input type="number" class="form-control" id="mes" name="mes" value="{{ old('mes') }}" required>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" value="{{ old('anio') }}">
        </div>
        <div class="form-group">
            <label for="recurrente">Recurrente</label>
            <input type="checkbox" id="recurrente" name="recurrente" value="1" {{ old('recurrente') ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
