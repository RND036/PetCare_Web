<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PetOwner;
use Illuminate\Support\Facades\Auth;

class PetOwnerIndex extends Component
{

    public $petowners_name;
    public $petowners_address;
    public $petowners_phone;
    public $petowners_email;

    protected $rules = [
        'petowners_name' => 'required|unique:pet_owners,petowners_name',
        'petowners_address' => 'required',
        'petowners_phone' => 'required|unique:pet_owners,petowners_phone',
        'petowners_email' => 'required|unique:pet_owners,petowners_email',
    ];

    public function save()
    {
        $this->validate();

        // Create a new PetOwner record
        PetOwner::create([
            'user_id' => Auth::id(),
            'petowners_name' => $this->petowners_name,
            'petowners_address' => $this->petowners_address,
            'petowners_phone' => $this->petowners_phone,
            'petowners_email' => $this->petowners_email,
        ]);

        // Reset form fields
        $this->reset(['petowners_name', 'petowners_address', 'petowners_phone', 'petowners_email']);

        // Optionally, redirect or flash a success message
        session()->flash('message', 'Pet owner created successfully.');
    }
    public function render()
    {
        return view('livewire.pet-owner-index');
    }
}
