<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'gender', 'contact', 'location', 'image', 'dob',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function becomedoctor()
    {
        return $this->hasOne(Becomedoctor::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    // public function feedbacks()
    // {
    //     return $this->hasMany(Feedback::class);
    // }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
