<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinations extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_detail_id',
        'vaccine_name',
        'vaccination_exp_date',
        'vaccine_manufacture',
        'batch_number',
        'date_administered',
        'next_due_date',
        'dosage',
        'administration_method',
        'notes',
    ];
     

    protected $table = 'vaccinations';
    
protected $casts = [
    'date_administered' => 'datetime',
    'next_due_date' => 'datetime',
    'vaccination_exp_date' => 'datetime',
];


    public function petDetails()
    {
        return $this->belongsTo(PetDetails::class, 'pet_detail_id');
    }

    
}
