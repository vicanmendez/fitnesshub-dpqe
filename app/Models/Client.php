<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'fitness_clients';


    protected $fillable = [
        'user_id',
        'sex',
        'country_phone_prefix',
        'phone',
        'height',
        'weight',
        'training_type',
        'require_checkups',
        'checkups_frequency',
        'require_questionnaire',
        'questionnaire_link',
        'gym_id',
        // Add other fields here...
    ];

    // Define relationships

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Gym relationship
    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    // Define getters and setters

    // Example getter for full name
    public function getFullNameAttribute()
    {
        return $this->user->name; // Assuming 'name' is a field in the 'users' table
    }

    // Example setter for height in centimeters
    public function setHeightAttribute($value)
    {
        $this->attributes['height'] = $value * 100; // Convert to centimeters
    }


    // Add other getters and setters as needed

    // Add any additional methods or scopes here
}
