<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'country_id'];

    // Define relationships if needed, such as with Province
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
