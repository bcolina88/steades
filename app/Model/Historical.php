<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Historical extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "historicals";

    protected $fillable = [
        'tipo','rango','fecha_inicio','fecha_fin','monto','idempleado', 'idtranscriptor','descripcion'
    ];

   
    public function empleado()
    {

        return $this->belongsTo('App\Model\User','idempleado','id');
    }

    public function transcriptor()
    {

        return $this->belongsTo('App\Model\User','idtranscriptor','id');
    }

}
