<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','password', 'department_id', 'status', 'gender', 'experience', 'qualification'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function timings()
    {
        return $this->hasMany(Timing::class);
    }
}
