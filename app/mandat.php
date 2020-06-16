<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class mandat extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matOrph','nomTuteur', 'prenomTuteur', 'beneficiaire','montant','etat', 'matAgt','dateEmission','datePayement',
    ];
}


