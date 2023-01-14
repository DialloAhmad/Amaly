<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'genre',
        'statut',
        'profil',
        'email',
        'password',
        'prenom',
        'description',
        'id',
        'telephone',
        'poste',
        'compagnie',
        'quartier',
        'ville', 
        'photo',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
//relation entres le modèle users et le modèle cas
    public function cas() 
        { 
            return $this->hasMany(Cas::class); 
        }

//relation entres le modèle users et le modèle RetourCas
    public function retourcas()
        {
            return $this->hasMany(RetourCas::class);
        }
}
