<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = ['nom', 'autre'];

    //relation entre catégories et cas
    public function cas() 
    { 
        return $this->hasMany(Cas::class); 
    }
}
