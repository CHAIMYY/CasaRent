<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $table = 'annonce';

    protected $fillable = [
        'id',
        'titre',
        'description',
        'location',
        'places',
        'mode',
        'statut',
        'categorie_id',
        'user_id',
    ];

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
