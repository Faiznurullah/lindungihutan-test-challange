<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'genre',
        'artis',
        'produser',
        'income',
        'nomination'
    ];

    public function getGenre()
    {
        return $this->belongsTo(genre::class, 'genre', 'code');
    }

    public function getArtis()
    {
        return $this->belongsTo(artis::class, 'artis', 'code');
    }

    public function getProduser()
    {
        return $this->belongsTo(produser::class, 'produser', 'code');
    }


}
