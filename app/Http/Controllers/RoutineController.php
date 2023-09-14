<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Routine;
use App\Models\Program;
use App\Models\RoutineExercise;
use App\Models\Exercise;

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
        return view('programs.edit', ['routine' => $routine, 'currentUser' => $currentUser]);

    }

    public function update(Request $request, $id) {
        $routine = Routine::find($id);
        $routine->title = $request->title;
        $routine->type = $request->type;
        if ($routine->save()) {
            return redirect()->route('programs')->with('success', 'Rutina actualizada correctamente');
        } else {
            return redirect()->route('programs.edit')->with('error', 'Error al actualizar la rutina, asegurar que no falten datos requeridos');
        }

        return redirect()->route('programs');
    }

    public function delete($id) {
        $routine = Routine::find($id);
        $routine->delete();
        return redirect()->route('programs')->with('success', 'Rutina eliminada correctamente');
    }

    public function exercises($id) {
        $routine = Routine::find($id);
        $routineExercises = RoutineExercise::where('routine_id', $id)->get();
        $currentUser = auth()->user();
        $exercises = Exercise::all();
        return view('programs.routines', ['routine' => $routine, 'routineExercises' => $routineExercises, 'currentUser' => $currentUser, 'exercises' => $exercises]);
    }

    public function loadExercise($id, $id_ejer) {
        $routine = Routine::find($id);
        $routineExercises = RoutineExercise::where('routine_id', $id)->get();
        $currentUser = auth()->user();
        $exercises = Exercise::all();
        $exercise = Exercise::find($id_ejer);
        return view('programs.routines', ['routine' => $routine, 'routineExercises' => $routineExercises, 'currentUser' => $currentUser, 'exercises' => $exercises, 'ex' => $exercise]);
    }

    public function newExercise(Request $request, $id, $id_ejer) {
        $routineExercise = new RoutineExercise();
        $routineExercise->routine()->associate($id);
        $routineExercise->exercise()->associate($id_ejer);
        $routineExercise->sets = $request->sets;
        $routineExercise->repetitions = $request->repetitions;
        $routineExercise->rest_seconds = $request->rest_seconds;
        $routineExercise->exercise_seconds = $request->exercise_seconds;
        $routineExercise->progress_metric = $request->progress_metric;
        $routineExercise->progress_value = $request->progress_value;
        if ($routineExercise->save()) {
            return redirect()->route('routines.exercises', ['id' => $id])->with('success', 'Ejercicio añadido correctamente');
        } else {
            return redirect()->route('routines.exercises', ['id' => $id])->with('error', 'Error al añadir el ejercicio, asegurar que no falten datos requeridos');
        }

        return redirect()->route('routines.exercises', ['id' => $id]);
    }

    public function deleteExercise(Request $request, $id, $id_ejer) {
        $routineExercise = RoutineExercise::where('routine_id', $id)->where('exercise_id', $id_ejer)->first();
        if($routineExercise->delete()) {
            return redirect()->route('routines.exercises', ['id' => $id])->with('success', 'Ejercicio eliminado correctamente');
        } else {
            return redirect()->route('routines.exercises', ['id' => $id])->with('error', 'Error al eliminar el ejercicio'); 
        }
    }

}
