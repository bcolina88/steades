<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "timesheets";

    protected $fillable = [
        'rango','fecha_inicio','fecha_fin','total','idempleado','lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo',
    ];

   
    public function empleado()
    {

        return $this->belongsTo('App\Model\User','idempleado','id');
    }


}
