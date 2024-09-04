<div>
<x-mary-header title="Vaccinations-History" subtitle=" where you can review and manage the complete vaccination records of your pets.">
</x-mary-header>

<div class="p-4">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-black-100 text-black border-b">
                <th class="py-2 px-4 text-left">Pet Name</th>
                <th class="py-2 px-4 text-left">Vaccine Name</th>
                <th class="py-2 px-4 text-left">Date Administered</th>
                <th class="py-2 px-4 text-left">Next Due Date</th>
                <th class="py-2 px-4 text-left">Dosage</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vaccinations as $vaccination)
                <tr class="border-b hover:bg-black text-black">
                    <td class="py-2 px-4">{{ $vaccination->petDetails->pet_name }}</td>
                    <td class="py-2 px-4">{{ $vaccination->vaccine_name }}</td>
                    <td class="py-2 px-4">{{ $vaccination->date_administered->format('Y-m-d') }}</td>
                    <td class="py-2 px-4">{{ $vaccination->next_due_date->format('Y-m-d') }}</td>
                    <td class="py-2 px-4">{{ $vaccination->dosage }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
