<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'province_id'];

    // Define relationships if needed, such as with Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
