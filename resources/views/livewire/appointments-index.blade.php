<div>
    <x-mary-header title="Appointments" subtitle="Your upcoming appointments"></x-mary-header>

    <div class="p-4">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 text-black border-b">
                    <th class="py-2 px-4 text-left">Pet Name</th>
                    <th class="py-2 px-4 text-left">Service Required</th>
                    <th class="py-2 px-4 text-left">Appointment Date</th>
                    <th class="py-2 px-4 text-left">Appointment Time</th>
                    <th class="py-2 px-4 text-left">Pet Type</th>
                    <th class="py-2 px-4 text-left">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr class="border-b hover:bg-gray-50 text-black">
                        <td class="py-2 px-4">{{ $appointment->pet_name }}</td>
                        <td class="py-2 px-4">{{ $appointment->service_required }}</td>
                        <td class="py-2 px-4">{{ $appointment->appointment_date }}</td>
                        <td class="py-2 px-4">{{ $appointment->appointment_time }}</td>
                        <td class="py-2 px-4">{{ $appointment->pet_type }}</td>
                        <td class="py-2 px-4">{{ $appointment->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Button -->
        <div class="mt-4">
            <a href="{{ url('/Appointment') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg shadow-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                Add New Appointment
            </a>
        </div>
    </div>
</div>
