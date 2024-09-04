<?php

namespace App\Livewire;

use App\Models\PetDetails;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PetDetailsIndex extends Component
{
    use WithFileUploads;

    public $petModal = false;
    public $confirmingPetDeletion = false;
    public $modelId;
    public $pet_name;
    public $pet_breed;
    public $pet_gender;
    public $date_of_birth;
    public $pet_picture;
    public $search = '';

    public $genderOptions = [['id' => '', 'name' => 'Select Gender'],['id' => 'Male', 'name' => 'Male'], ['id' => 'Female', 'name' => 'Female']];

    protected $rules = [
        'pet_name' => 'required|max:255',
        'pet_breed' => 'required|max:255',
        'pet_gender' => 'required|in:Male,Female',
        'date_of_birth' => 'required|date',
        'pet_picture' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function render()
    {
        $pets = PetDetails::where('pet_name', 'like', "%{$this->search}%")->get();
        return view('livewire.pet-details-index', compact('pets'));
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->petModal = true;
    }

    public function closeModal()
    {
        $this->petModal = false;
    }

    private function resetCreateForm()
    {
        $this->modelId = null;
        $this->pet_name = '';
        $this->pet_breed = '';
        $this->pet_gender = '';
        $this->date_of_birth = '';
        $this->pet_picture = null;
    }

    public function savePet()
    {
        $this->validate();

        $data = [
            'pet_name' => $this->pet_name,
            'pet_breed' => $this->pet_breed,
            'pet_gender' => $this->pet_gender,
            'date_of_birth' => $this->date_of_birth,
            'pet_picture' => $this->pet_picture ? $this->pet_picture->store('pet_pictures', 'public') : null,
            'pet_owner_id' => auth()->id(),
        ];

        if ($this->modelId) {
            // Update existing pet
            PetDetails::find($this->modelId)->update($data);
            session()->flash('success', 'Pet updated successfully!');
        } else {
            // Create new pet
            PetDetails::create($data);
            session()->flash('success', 'Pet created successfully!');
        }

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $pet = PetDetails::findOrFail($id);
        $this->modelId = $id;
        $this->pet_name = $pet->pet_name;
        $this->pet_breed = $pet->pet_breed;
        $this->pet_gender = $pet->pet_gender;
        $this->date_of_birth = $pet->date_of_birth->format('Y-m-d');
        $this->openModal();
    }

    public function confirmPetDeletion($id)
    {
        $pet = PetDetails::find($id);

        if ($pet) {
            $this->confirmingPetDeletion = true;
            $this->modelId = $id;
        } else {
            session()->flash('error', 'Pet not found.');
        }
    }

    public function deletePet()
    {
        $pet = PetDetails::find($this->modelId);
        if (!$pet) {
            session()->flash('error', 'Pet not found.');
            return;
        }

        $pet->delete();
        $this->confirmingPetDeletion = false;
        $this->resetCreateForm();
        session()->flash('success', 'Pet deleted successfully.');
    }
}
