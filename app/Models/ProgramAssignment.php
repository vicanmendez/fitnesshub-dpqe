<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Client;

class ProgramAssignment extends Model
{
    use HasFactory;

    protected $table = 'trainer_program_assignments';

    protected $fillable = [
        'description',
        'comments',
        'completed',
        'fitness_client_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class,  'fitness_client_id');
    }
}
