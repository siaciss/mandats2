<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Journalannulation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matOrph','nomTuteur', 'prenomTuteur', 'beneficiaire','montant','matAgtPayeur','matAgtAnnulateur','dateEmission','datePayement','dateAnnulation','heureAnnulation',
    ];

    protected $primaryKey = ['matOrph','dateAnnulation','heureAnnulation'];
}
