<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Client;
use App\Models\ProgramAssignment;

class AssignmentController extends Controller
{
    //
    public function index() {
        $currentUser = auth()->user();
        $programs = Program::all();
        $trainers = Trainer::all();
        $clients = Client::all();
        $assignments = ProgramAssignment::all();
        return view('assignments.index', ['programs' => $programs, 'trainers' => $trainers, 'clients' => $clients, 'assignments' => $assignments, 'currentUser' => $currentUser]);
    }

    public function new(Request $request) {
        $assignment = new ProgramAssignment();
        $assignment->program_id = $request->program;
        $assignment->trainer_id = $request->trainer;
        $assignment->fitness_client_id = $request->client;
        $assignment->description = $request->description;
        $assignment->comments = isset($request->comments) ? $request->comments : "";
        $assignment->completed = $request->completed; 

        if ($assignment->save()) {
            return redirect()->route('assignments')->with('success', 'Asignación creada correctamente');
        } else {
            return redirect()->route('assignments')->with('error', 'Error al crear la asignación, asegurar que no falten datos requeridos');
        }

        return redirect()->route('assignments');
    }

    public function delete($id) {
        $assignment = ProgramAssignment::find($id);
        $assignment->delete();
        return redirect()->route('assignments')->with('success', 'Asignación eliminada correctamente');
    }
}
