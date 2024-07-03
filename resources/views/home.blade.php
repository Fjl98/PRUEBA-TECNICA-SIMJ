@extends('layouts.app')

@section('content')
<div class="container">
    <div id="calendar"></div>
</div>

<!-- Modal para la creación de festivos -->
<div class="modal fade" id="createHolidayModal" tabindex="-1" aria-labelledby="createHolidayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="createHolidayForm" method="POST">
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
                    <div class="row">
                        <div class="col">
                            <label for="dia" class="form-label">Día</label>
                            <input type="number" class="form-control" id="dia" name="dia">
                        </div>
                        <div class="col">
                            <label for="mes" class="form-label">Mes</label>
                            <input type="number" class="form-control" id="mes" name="mes">
                        </div>
                        <div class="col">
                            <label for="anio" class="form-label">Año</label>
                            <input type="number" class="form-control" id="anio" name="anio" value="{{ date('Y') }}">
                        </div>
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
    </div>
</div>

<!-- Modal para la edición de festivos -->
<div class="modal fade" id="editHolidayModal" tabindex="-1" aria-labelledby="editHolidayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editHolidayForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editHolidayModalLabel">Editar Festivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="edit_color" class="form-label">Color</label>
                        <input type="color" class="form-control" id="edit_color" name="color">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="edit_dia" class="form-label">Día</label>
                            <input type="number" class="form-control" id="edit_dia" name="dia">
                        </div>
                        <div class="col">
                            <label for="edit_mes" class="form-label">Mes</label>
                            <input type="number" class="form-control" id="edit_mes" name="mes">
                        </div>
                        <div class="col">
                            <label for="edit_anio" class="form-label">Año</label>
                            <input type="number" class="form-control" id="edit_anio" name="anio" value="{{ date('Y') }}">
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="edit_recurrente" name="recurrente">
                        <label class="form-check-label" for="edit_recurrente">Recurrente</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Incluir los scripts necesarios para el calendario y Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Define the route in a JavaScript variable
    var holidaysStoreRoute = "{{ route('holidays.store') }}";
</script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
