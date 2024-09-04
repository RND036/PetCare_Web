<div class="p-4 space-y-4">
    <x-mary-header title="Dashboard" subtitle="
Welcome to your dashboard, where you can effortlessly track, analyze, and manage all your key data in one place." />
    
    <div class="flex space-x-2">
        <x-mary-stat
            title="Appointments"
            description="This month"
            value="{{ $appointmentsCount }}" 
            icon="o-calendar"
            class="text-blue-900"
            tooltip="Total appointments scheduled this month" />

        <x-mary-stat
            title="Vaccinations"
            description="Due this month"
            value="{{ $vaccinationsDue }}"  
            icon="o-heart"
            class="text-red-500"
            tooltip="Upcoming vaccinations" />

        <x-mary-stat
            title="Current Date & Time"
            description="{{ now()->setTimezone('Asia/Colombo')->format('l, F j, Y') }}"
            value="{{ now()->setTimezone('Asia/Colombo')->format('h:i A') }}"
            icon="o-clock"
            class="text-green-500"
            color="text-blue-500"
            tooltip="This is the current date and time!" />
    </div>
   
</div>
