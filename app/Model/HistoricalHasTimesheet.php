<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoricalHasTimesheet extends Model
{
    
    protected $table = "historical_has_timesheets";
    

    protected $fillable = [
        'idtimesheet','idhistorical'
    ];
    
    /**
     * User who owns a timesheet.
     *
     * @return void
     */
    public function timesheet()
    {
        return $this->belongsTo('App\Model\Timesheet','idtimesheet','id');
    }

    /**
     * User who owns a historical.
     *
     * @return void
     */
    public function historical()
    {
        return $this->belongsTo('App\Model\Historical','idhistorical','id');
    }
}
