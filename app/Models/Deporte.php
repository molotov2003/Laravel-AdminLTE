<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Deporte extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //esta funcion fillable se utiliza para saber que atributos estan permitidos usar en este caso solo esto tres se pueden manipular a la hora de utilizar este modelo en el controlador  solo permite insertar desde la vista o con eloquent en la consola
    protected $fillable = [
        'name',
        'descripcion',
        'personas',
    ];

    protected $guarded  = [];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
