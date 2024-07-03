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
    // Valida y guarda los datos del festivo desde el formulario
    $validatedData = $request->validate([
        'nombre' => 'required|string',
        'color' => 'required|string',
        'dia' => 'required|integer',
        'mes' => 'required|integer',
        'anio' => 'required|integer',
        'recurrente' => 'boolean',
    ]);

    // Crea un nuevo festivo
    $holiday = new Holiday();
    $holiday->nombre = $validatedData['nombre'];
    $holiday->color = $validatedData['color'];
    $holiday->dia = $validatedData['dia'];
    $holiday->mes = $validatedData['mes'];
    $holiday->anio = $validatedData['anio'];
    $holiday->recurrente = $request->has('recurrente'); // true o false

    $holiday->save();

    // Redirige a donde corresponda después de guardar el festivo
    return redirect()->route('home')->with('success', 'Festivo creado exitosamente.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'color' => 'required|string|max:7',
        'dia' => 'required|integer|min:1|max:31',
        'mes' => 'required|integer|min:1|max:12',
        'anio' => 'required|integer|min:1900|max:9999',
        'recurrente' => 'nullable|boolean',
    ]);

    $holiday = Holiday::findOrFail($id);
    $holiday->nombre = $request->nombre;
    $holiday->color = $request->color;
    $holiday->dia = $request->dia;
    $holiday->mes = $request->mes;
    $holiday->anio = $request->anio;
    $holiday->recurrente = $request->recurrente ?? false;
    $holiday->save();

    return redirect()->route('home')->with('success', 'Holiday updated successfully');
}


    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully');
    }

    public function edit($id)
{
    $holiday = Holiday::findOrFail($id);
    return view('holidays.edit', compact('holiday'));
}

public function apiIndex()
{
    $holidays = Holiday::all();

    $events = $holidays->map(function ($holiday) {
        return [
            'id' => $holiday->id,
            'title' => $holiday->nombre,
            'start' => sprintf('%04d-%02d-%02d', $holiday->anio, $holiday->mes, $holiday->dia),
            'color' => $holiday->color,
            'extendedProps' => [
                'nombre' => $holiday->nombre,
                'color' => $holiday->color,
                'dia' => $holiday->dia,
                'mes' => $holiday->mes,
                'anio' => $holiday->anio,
                'recurrente' => $holiday->recurrente,
            ],
        ];
    });

    return response()->json($events);
}

}
