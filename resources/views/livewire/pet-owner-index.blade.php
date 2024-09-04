<div>
<x-mary-header title="PetOwner-Details" subtitle="where you can easily access and manage all the essential information about your pets and their care.">
</x-mary-header>


<div>
<x-mary-form wire:submit.prevent="save">
    {{-- Full error bag --}}
    <x-mary-errors title="Oops!" description="Please, fix them." icon="o-face-frown" />

    {{-- Pet Owner's Name --}}
    <x-mary-input label="Pet Owner's Name" wire:model="petowners_name" />
    @error('petowners_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    {{-- Pet Owner's Address --}}
    <x-mary-input label="Address" wire:model="petowners_address" />
    @error('petowners_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    {{-- Pet Owner's Phone --}}
    <x-mary-input label="Phone Number" wire:model="petowners_phone" />
    @error('petowners_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    {{-- Pet Owner's Email --}}
    <x-mary-input label="E-mail" wire:model="petowners_email" />
    @error('petowners_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <x-slot:actions>
        <x-mary-button label="Save" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-mary-form>

</div>

</div>