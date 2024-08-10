<?php

namespace App\Http\Controllers;
use App\Models\tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $query = Tarea::query();

         // Filtrar por prioridad
         if ($request->filled('prioridad')) {
             $query->where('tarea_estado', $request->input('prioridad'));
         }

         // Buscar por título o descripción
         if ($request->filled('search')) {
             $search = $request->input('search');
             $query->where(function($q) use ($search) {
                 $q->where('tarea_titulo', 'like', "%{$search}%")
                   ->orWhere('tarea_descripcion', 'like', "%{$search}%");
             });
         }

         // Paginación
         $Tareas = $query->paginate(10);

         return view('tarea.index', compact('Tareas'));
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'tarea_titulo' => 'required',
            'tarea_descripcion' => 'required',
            'tarea_estado' => 'required',
        ]);

        if ($validation) {
            $Tarea = Tarea::create($request->all());
            return redirect()->route('tarea.index')->with('success', 'Tarea creada exitosamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $Tarea = Tarea::findOrFail($id);
    return view('tarea.show', compact('Tarea'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Tarea = Tarea::find($id);
        return view('tarea.edit', compact('Tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'tarea_titulo' => 'required',
            'tarea_descripcion' => 'required',
            'tarea_estado' => 'required',
        ]);

        if ($validation) {
            $Tarea = Tarea::find($id);
            $Tarea->update($request->all());
            return redirect()->route('tarea.index')->with('success', 'Tarea actualizada exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Tarea = Tarea::findOrFail($id);
        $Tarea->delete();
        return redirect()->route('tarea.index')->with('success', 'Tarea eliminada exitosamente');
    }


public function restore(string $id)
{
    $Tarea = Tarea::onlyTrashed()->findOrFail($id);
    $Tarea->restore();
    return redirect()->route('tarea.index')->with('success', 'Tarea restaurada exitosamente');
}

public function forceDelete(string $id)
{
    $Tarea = Tarea::onlyTrashed()->findOrFail($id);
    $Tarea->forceDelete();
    return redirect()->route('tarea.index')->with('success', 'Tarea eliminada permanentemente');
}

}
