<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;



    protected $fillable = [
        'reason',
        'begin',
        'end',
        'session',
        'color',
        'textColor',
        'booked_id',
        'user_id',
    ];

    //Relacionamento
    public function user()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
}
