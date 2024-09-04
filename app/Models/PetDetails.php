<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vaccinations;

class PetDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'pet_breed',
        'pet_gender',
        'date_of_birth',
        'pet_picture',
        'pet_owner_id',
    ];

    protected $table = 'pet_details';

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function petOwner()
    {
        return $this->belongsTo(PetOwner::class, 'pet_owner_id');
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccinations::class, 'pet_detail_id'); // Use proper class name
    }
}
