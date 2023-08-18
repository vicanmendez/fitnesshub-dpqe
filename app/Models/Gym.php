<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city_id',
        'phone',
        'lat',
        'long',
    ];

    // Define relationships

    // City relationship
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    // Define getters and setters

    // Example getter for full address
    public function getFullAddressAttribute()
    {
        return $this->address . ', ' . $this->city->name; // Assuming 'name' is a field in the 'cities' table
    }

    // Example setter for latitude in degrees
    public function setLatAttribute($value)
    {
        $this->attributes['lat'] = $value * 1.0; // Convert to decimal degrees
    }

    // Add other getters and setters as needed

    // Add any additional methods or scopes here
}
