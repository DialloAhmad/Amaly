<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory;
    protected $fillable = [
        'cas_id',
        'montant',
        'commentaire',
        'image1',
        'image2', 
        'image3', 
        'image4',       
    ];
    public function cas()
        { 
            return $this->belongsTo(Cas::class); 
        }
    public function userphones()
    { 
        return $this->belongsTo(Userphone::class); 
    }   
}
