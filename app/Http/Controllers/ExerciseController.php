<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    //
    public function index()
    {
        $exercises = Exercise::all();
        $currentUser = auth()->user();
        return view('exercises.index', ['exercises' => $exercises, 'currentUser' => $currentUser]);
    }

    public function new(Request $request)
    {
        $exercise = new Exercise();
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->video_url = $request->video_url;
        if ($exercise->save()) {
            return redirect()->route('exercises').with('success', 'Ejercicio creado correctamente');
        } else {
            return redirect()->route('exercises.new').with('error', 'Error al crear el ejercicio, asegurar que no falten datos requeridos');
        }

        return redirect()->route('exercises');
    }

    public function edit($id) {
        $exercise = Exercise::find($id);
        $currentUser = auth()->user();
        return view('exercises.edit', ['exercise' => $exercise, 'currentUser' => $currentUser]);
    }

    public function update(Request $request, $id) {
        
        $exercise = Exercise::find($id);
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->video_url = $request->video_url;
        if ($exercise->save()) {
            return redirect()->route('exercises')->with('success', 'Ejercicio actualizado correctamente');
        } else {
            return redirect()->route('exercises.edit')->with('error', 'Error al actualizar el ejercicio, asegurar que no falten datos requeridos');
        }

        return redirect()->route('exercises');
    }

}
