@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Días Festivos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('holidays.create') }}" class="btn btn-primary mb-3">Crear Día Festivo</a>

    @if ($holidays->isEmpty())
        <p>No hay días festivos registrados.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Día</th>
                    <th>Mes</th>
                    <th>Año</th>
                    <th>Recurrente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($holidays as $holiday)
                    <tr>
                        <td>{{ $holiday->nombre }}</td>
                        <td><span>{{ $holiday->color }}</span></td>
                        <td>{{ $holiday->dia }}</td>
                        <td>{{ $holiday->mes }}</td>
                        <td>{{ $holiday->anio }}</td>
                        <td>{{ $holiday->recurrente ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('holidays.show', $holiday->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('holidays.edit', $holiday->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
