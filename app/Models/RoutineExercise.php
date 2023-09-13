<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Routine;
use App\Models\Exercise;

class RoutineExercise extends Model
{
    use HasFactory;

    protected $table = 'routine_exercise';

    protected $fillable = [
        'routine_id',
        'exercise_id',
        'sets',
        'repetitions',
        'rest_seconds',
        'exercise_seconds',
        'progress_metric',
        'progress_value',
    ];

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }


}
