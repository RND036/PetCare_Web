<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Vaccinations;
use Illuminate\Support\Facades\Auth;

class DashboardIndex extends Component
{
    public $appointmentsCount;
    public $vaccinationsDue;
    public $upToDateVaccinations;
    public $overdueVaccinations;

    public function mount()
    {
        // Count appointments for this month
        $this->appointmentsCount = Appointment::where('petowner_email', Auth::user()->email)
            ->whereMonth('appointment_date', now()->month)
            ->count();

        // Count vaccinations due for this month
        $this->vaccinationsDue = Vaccinations::whereHas('petDetails', function($query) {
            $query->where('pet_owner_id', Auth::id());
        })->whereMonth('next_due_date', now()->month)
          ->count();

        // Calculate up-to-date and overdue vaccinations
        $this->upToDateVaccinations = Vaccinations::whereHas('petDetails', function($query) {
            $query->where('pet_owner_id', Auth::id());
        })->where('next_due_date', '>=', now())
          ->count();

        $this->overdueVaccinations = Vaccinations::whereHas('petDetails', function($query) {
            $query->where('pet_owner_id', Auth::id());
        })->where('next_due_date', '<', now())
          ->count();
    }

    public function render()
    {
        return view('livewire.dashboard-index', [
            'appointmentsCount' => $this->appointmentsCount,
            'vaccinationsDue' => $this->vaccinationsDue,
            'upToDateVaccinations' => $this->upToDateVaccinations,
            'overdueVaccinations' => $this->overdueVaccinations,
        ]);
    }
}
