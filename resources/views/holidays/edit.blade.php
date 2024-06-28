@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Holiday</h1>
    <form action="{{ route('holidays.update', $holiday->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $holiday->name }}" required>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="color" class="form-control" id="color" name="color" value="{{ $holiday->color }}" required>
        </div>
        <div class="form-group">
            <label for="day">Day</label>
            <input type="number" class="form-control" id="day" name="day" value="{{ $holiday->day }}" required min="1" max="31">
        </div>
        <div class="form-group">
            <label for="month">Month</label>
            <input type="number" class="form-control" id="month" name="month" value="{{ $holiday->month }}" required min="1" max="12">
        </div>
        <div class="form-group">
            <label for="year">Year (optional)</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ $holiday->year }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="recurrent" name="recurrent" {{ $holiday->recurrent ? 'checked' : '' }}>
            <label class="form-check-label" for="recurrent">Recurrent</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
