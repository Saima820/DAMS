<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    //1.hasMany will return collection(we will use it for one to many relation)
    //2.hasOne(optional) and belongsTo(mandatory) will return object(one to one)
    //patient_id
    public function patient()
    {
        return $this->belongsTo(Patient::class);

    }

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    public function slot()
    {
        return $this->belongsTo(Timeslot::class,'time_slot_id');
    }

    




}
