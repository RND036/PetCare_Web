<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentsIndex extends Component
{
    public $appointments;

    public function mount()
    {
        $this->appointments = Appointment::where('petowner_email', Auth::user()->email)->get();
    }

    public function render()
    {
        return view('livewire.appointments-index', [
            'appointments' => $this->appointments,
        ]);
    }
}
