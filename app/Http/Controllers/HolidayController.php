<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::all();
        return view('holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('holidays.create');
    }

    public function store(Request $request)
    {
        $holiday = new Holiday();
        $holiday->nombre = $request->nombre;
        $holiday->color = $request->color;
        $holiday->dia = $request->dia;
        $holiday->mes = $request->mes;
        $holiday->anio = $request->anio;
        $holiday->recurrente = $request->recurrente ? true : false;
        $holiday->save();

        return redirect()->route('holidays.index');
    }

    public function edit(Holiday $holiday)
    {
        return view('holidays.edit', compact('holiday'));
    }

    public function update(Request $request, Holiday $holiday)
    {
        $holiday->nombre = $request->nombre;
        $holiday->color = $request->color;
        $holiday->dia = $request->dia;
        $holiday->mes = $request->mes;
        $holiday->anio = $request->anio;
        $holiday->recurrente = $request->recurrente ? true : false;
        $holiday->save();

        return redirect()->route('holidays.index');
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect()->route('holidays.index');
    }

    public function apiIndex()
    {
        return response()->json(Holiday::all());
    }


}
