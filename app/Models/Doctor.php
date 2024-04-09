<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department_id',
        'experience',
        'qualification',
        'specialization',
        'education',
        'work_places',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function timings()
    {
        return $this->hasMany(Timing::class);
    }

    public function appointments()
    {
        return $this->hasManyThrough(Appointment::class, Timing::class);
    }

    public function records()
    {
    return $this->hasMany(Record::class);
    }

}
