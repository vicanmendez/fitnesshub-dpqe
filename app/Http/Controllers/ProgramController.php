<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\RoutineExercise;
use App\Models\Routine;
use App\Models\RoutineProgram;

class ProgramController extends Controller
{
    //
    public function index()
    {
        $programs = Program::all();
        $routines = Routine::all();
        $currentUser = auth()->user();
        return view('programs.index', ['programs' => $programs, 'currentUser' => $currentUser, 'routines' => $routines]);
    }

    public function new(Request $request)
    {
        $program = new Program();
        $program->title = $request->title;
        $program->type = $request->type;
        if ($program->save()) {
            return redirect()->route('programs')->with('success', 'Programa creado correctamente');
        } else {
            return redirect()->route('programs.new')->with('error', 'Error al crear el programa, asegurar que no falten datos requeridos');
        }

        return redirect()->route('programs');
    }

    public function edit($id) {
        $program = Program::find($id);
        $currentUser = auth()->user();
        return view('programs.edit', ['program' => $program, 'currentUser' => $currentUser]);
    }

    public function update(Request $request, $id) {
        
        $program = Program::find($id);
        $program->title = $request->title;
        $program->type = $request->type;
        if ($program->save()) {
            return redirect()->route('programs')->with('success', 'Programa actualizado correctamente');
        } else {
            return redirect()->route('programs.edit')->with('error', 'Error al actualizar el programa, asegurar que no falten datos requeridos');
        }

        return redirect()->route('programs');
    }

    public function delete($id) {
        $program = Program::find($id);
        $program->delete();
        return redirect()->route('programs')->with('success', 'Programa eliminado correctamente');
    }

    public function routines($id) {
        $program = Program::find($id);
        $routinePrograms = RoutineProgram::where('program_id', $id)->get();
        $currentUser = auth()->user();
        $routines = Routine::all();
        return view('programs.program_routines', ['program' => $program, 'routinePrograms' => $routinePrograms, 'currentUser' => $currentUser, 'routines' => $routines]);
    }

    /*
    public function loadRoutine($id, $id_rut) {
        $program = Program::find($id);
        $routinePrograms = RoutineProgram::where('program_id', $id)->get();
        $currentUser = auth()->user();
        $routines = Routine::all();
        $currentRoutine = Routine::find($id_rut);
        return view('programs.program_routines', ['program' => $program, 'routinePrograms' => $routinePrograms, 'currentUser' => $currentUser, 'routines' => $routines, 'currentRoutine' => $currentRoutine]);
    }
    */

    //PRE CONDITION: The routine must be previously
    public function newRoutine(Request $request, $id) {
        $routineProgram = new RoutineProgram();
        $routineProgram->program_id = $id;
        $routineProgram->routine_id = $request->routine;
        if ($routineProgram->save()) {
            return redirect()->route('programs.routines', ['id' => $id])->with('success', 'Rutina agregada correctamente');
        } else {
            return redirect()->route('programs.routines', ['id' => $id])->with('error', 'Error al agregar la rutina, asegurar que no falten datos requeridos');
        }

        return redirect()->route('programs.routines', ['id' => $id]);
    }

    public function deleteRoutine($id, $id_rut) {
        $routineProgram = RoutineProgram::where('program_id', $id)->where('routine_id', $id_rut)->first();
        $routineProgram->delete();
        return redirect()->route('programs.routines', ['id' => $id])->with('success', 'Rutina eliminada correctamente');
    }

}
