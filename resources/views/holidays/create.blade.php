
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Festivo</h1>
    <form id="createHolidayForm" action="{{ route('holidays.store') }}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="createHolidayModalLabel">Crear Nuevo Festivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="color" class="form-control" id="color" name="color">
        </div>
        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <input type="number" class="form-control" id="dia" name="dia">
        </div>
        <div class="mb-3">
            <label for="mes" class="form-label">Mes</label>
            <input type="number" class="form-control" id="mes" name="mes">
        </div>
        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" class="form-control" id="anio" name="anio">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="recurrente" name="recurrente">
            <label class="form-check-label" for="recurrente">Recurrente</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
</div>
@endsection

