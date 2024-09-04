<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'petowner_name',
        'pet_name',
        'pet_type',
        'appointment_date',
        'appointment_time',
        'petowner_email',
        'phone_number',
        'service_required',

    ];
    public function routeNotificationForMail($notification)
{
    return $this->petowner_email;
}

    // Cast attributes to a specific data type
    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time' => 'datetime',

    ];

    // If you want to set the table name manually (optional)
    protected $table = 'appointments';

    public function petOwner()
{
    return $this->belongsTo(PetOwner::class, 'pet_owner_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'petowner_email', 'email');
}
}
