@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Holiday</h1>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $holiday->name }}" readonly>
    </div>
    <div class="form-group">
        <label for="color">Color</label>
        <input type="color" class="form-control" id="color" name="color" value="{{ $holiday->color }}" readonly>
    </div>
    <div class="form-group">
        <label for="day">Day</label>
        <input type="number" class="form-control" id="day" name="day" value="{{ $holiday->day }}" readonly>
    </div>
    <div class="form-group">
        <label for="month">Month</label>
        <input type="number" class="form-control" id="month" name="month" value="{{ $holiday->month }}" readonly>
    </div>
    <div class="form-group">
        <label for="year">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{ $holiday->year }}" readonly>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="recurrent" name="recurrent" {{ $holiday->recurrent ? 'checked' : '' }} disabled>
        <label class="form-check-label" for="recurrent">Recurrent</label>
    </div>
    <a href="{{ route('holidays.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
