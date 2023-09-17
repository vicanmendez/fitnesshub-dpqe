<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineProgram extends Model
{
    use HasFactory;

    protected $table = 'routine_program';
    
    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
