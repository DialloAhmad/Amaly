<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cas extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $table = "cas";
    
    protected $fillable = ['titre', 'categories_id', 'description', 'image1', 'image2', 'image3', 'image4', 'quartier', 'ville', 'numero',  'montant', 'status', 'users_id'];

    protected $dates = [ 'deleted_at' ];

    //relation entres le modèle users et le modèle cas
    public function users()
        { 
            return $this->belongsTo(User::class); 
        }
//relation entres le modèle catégories et le modèle cas
    public function categories()
    { 
        return $this->belongsTo(Category::class); 
    }
//relation entres le modèle RetourCas et le modèle cas
    public function retourcas()
        {
            return $this->hasOne(RetourCas::class);
        }
//relation entres le modèle dons et le modèle cas
    public function dons()
    { 
        return $this->hasMany(Don::class); 
    }   
}
