<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RetourCas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='retour_cas';

    protected $fillable=['titre', 'description', 'image1', 'image2', 'image3', 'image4', 'quartier', 'ville', 'users_id', 'cas_id'];

//relation entres le modèle RetourCas et le modèle users
    public function users()
        {
            return $this->belongsTo(User::class);
        }

//relation entres le modèle RetourCas et le modèle cas
    public function cas()
        {
            return $this->belongsTo(Cas::class);
        }
}
