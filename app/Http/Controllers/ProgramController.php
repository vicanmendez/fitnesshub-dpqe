<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    //
    public function index()
    {
        $programs = Program::all();
        $currentUser = auth()->user();
        return view('programs.index', ['programs' => $programs, 'currentUser' => $currentUser]);
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
}
