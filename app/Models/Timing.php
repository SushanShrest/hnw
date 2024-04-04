<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'day',
        'shift',
        'start_time',
        'end_time',
        'location',
        'visit_fee',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
