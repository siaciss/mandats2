<?php

namespace App;

/*use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class utilisateur extends Model //implements Authenticatable
{
    use Notifiable; //, BasicAuthenticatable;

*/
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricule','nom', 'prenom', 'statut', 'numeroBureau','password',
    ];


}
