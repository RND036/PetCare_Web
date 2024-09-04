<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vaccinations;
use Illuminate\Support\Facades\Auth;

class VaccinationsIndex extends Component
{
    public $vaccinations;

    public function mount()
    {
        // Fetch vaccination records for pets owned by the logged-in user
        $this->vaccinations = Vaccinations::whereHas('petDetails', function($query) {
            $query->where('pet_owner_id', Auth::id());
        })->with('petDetails')->get();
    }

    public function render()
    {
        return view('livewire.vaccinations-index', [
            'vaccinations' => $this->vaccinations,
        ]);
    }
}
