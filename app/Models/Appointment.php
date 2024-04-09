<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'timing_id',
        'date',
        'status',
        'location',
        'problem',
        'problem_description',
        'patient_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timing()
    {
        return $this->belongsTo(Timing::class);
    }
    
    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
