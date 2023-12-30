<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artis extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'gender',
        'salary',
        'award',
        'country' 
    ];
    
    public function country()
    {
        return $this->belongsTo(country::class, )->withDefault();
    }

    public function films()
{
    return $this->hasMany(Film::class, 'artis', 'code');
}

}
