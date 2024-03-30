<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'subject',
        // 'specialization',
        // 'work_experience',
        // 'education',
        // 'work_field',
        // 'reference_name',
        // 'reference_position',
        // 'reference_email',
        // 'reference_contact',
        // 'message',
        // 'file',
        // 'status',
        // 'reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
