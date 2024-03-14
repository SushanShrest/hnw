<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;
    protected $fillable = [
        'day','shift', 'start_time', 'end_time','doctor_id','avg_consultation_time'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
