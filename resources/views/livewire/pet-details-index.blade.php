<div>
    <x-mary-header title="Pet Details" subtitle="Manage your pets">
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-magnifying-glass" placeholder="Search pets..." wire:model.live="search" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" wire:click="create" />
        </x-slot:actions>
    </x-mary-header>

    <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($pets as $pet)
        <div class="p-4 bg-black dark:bg-white text-white dark:text-black rounded-lg shadow">

                <h3 class="text-lg font-semibold">{{ $pet->pet_name }}</h3>
                <p>Breed: {{ $pet->pet_breed }}</p>
                <p>Gender: {{ $pet->pet_gender }}</p>
                <p>Date of Birth: {{ $pet->date_of_birth->format('M d, Y') }}</p>
                @if($pet->pet_picture)
                    <img src="{{ Storage::url($pet->pet_picture) }}" alt="{{ $pet->pet_name }}" class="object-cover w-full h-32 mt-2 rounded-lg">
                @endif
                <div class="flex justify-between mt-4">
                    <x-mary-button icon="o-pencil" wire:click="edit({{ $pet->id }})" class="btn-secondary">
                        Edit
                    </x-mary-button>
                    <x-mary-button icon="o-trash" wire:click="confirmPetDeletion({{$pet->id}})" class="btn-primary">
                        Delete
                    </x-mary-button>
                </div>
                @if($confirmingPetDeletion && $modelId == $pet->id)
                    <x-mary-modal>
                        <x-slot name="title">Confirm Deletion</x-slot>
                        <div class="mb-5">
                            Are you sure you want to delete this pet?
                        </div>
                        <x-mary-button wire:click="deletePet" class="btn-secondary">Yes, Delete</x-mary-button>
                        <x-mary-button wire:click="$set('confirmingPetDeletion', false)">Cancel</x-mary-button>
                    </x-mary-modal>
                @endif
            </div>
        @endforeach
    </div>

    @if ($petModal)
        <x-mary-modal wire:model="petModal" title="{{ $modelId ? 'Edit Pet' : 'Create Pet' }}" class="backdrop-blur">
            <x-mary-form wire:submit.prevent="savePet">
                <x-mary-input name="pet_name" label="Pet Name" wire:model="pet_name" required />
                <x-mary-input name="pet_breed" label="Pet Breed" wire:model="pet_breed" required />
                <x-mary-select name="pet_gender" label="Pet Gender" :options="$genderOptions" wire:model="pet_gender" required />
                <x-mary-input type="date" name="date_of_birth" label="Date of Birth" wire:model="date_of_birth" required />
                <x-mary-file name="pet_picture" label="Pet Picture" wire:model="pet_picture" accept="image/*" />

                <div class="flex justify-between mt-4">
                    <x-mary-button type="submit">
                        {{ $modelId ? 'Update Pet' : 'Create Pet' }}
                    </x-mary-button>
                    <x-mary-button type="button" wire:click="closeModal" class="btn-secondary">
                        Cancel
                    </x-mary-button>
                </div>
            </x-mary-form>
        </x-mary-modal>
    @endif
</div>
