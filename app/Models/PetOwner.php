<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'petowners_name',
        'petowners_address',
        'petowners_phone',
        'petowners_email',
    ];

    protected $table = 'pet_owners';
    
    public function petDetails()
    {
        return $this->hasMany(PetDetails::class, 'pet_owner_id'); // Correct relationship name
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccinations()
    {
        return $this->hasManyThrough(
            Vaccinations::class, // Proper class name
            PetDetails::class,
            'pet_owner_id', // Foreign key on PetDetails table
            'pet_detail_id', // Foreign key on Vaccinations table
            'id', // Local key on PetOwner table
            'id'  // Local key on PetDetails table
        );
    }
}
