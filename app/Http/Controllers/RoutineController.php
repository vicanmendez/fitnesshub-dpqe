<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Routine;
use App\Models\Program;
use App\Models\RoutineExercise;

class RoutineController extends Controller
{
    //
    public function new(Request $request)
    {
        $routine = new Routine();
        $routine->title = $request->title;
        $routine->type = $request->type;
        $currentUser = auth()->user();
        $programs = Program::all();
        if ($routine->save()) {
            return redirect()->route('programs')->with('success', 'Rutina creada correctamente');
        } else {
            return redirect()->route('programs')->with('error', 'Error al crear la rutina, asegurar que no falten datos requeridos');
        }

        return redirect()->route('programs')->with('programs', $programs);
    }

    public function edit($id) {
        $routine = Routine::find($id);
        $currentUser = auth()->user();
        $programs = Program::all();
        return view('programs.index', ['routine' => $routine, 'currentUser' => $currentUser]);
        return redirect()->route('programs')->with('programs', $programs);

    }

    public function delete($id) {
        $routine = Routine::find($id);
        $routine->delete();
        return redirect()->route('programs')->with('success', 'Rutina eliminada correctamente');
    }
}
