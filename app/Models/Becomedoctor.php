<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Becomedoctor extends Model
{
    protected $fillable = ['user_id', 'medical_license', 'file', 'status'];

    /**
     * Get the user that owns the becomedoctor.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
