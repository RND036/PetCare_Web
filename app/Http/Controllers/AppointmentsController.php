<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentsRequest;
use App\Http\Requests\UpdateAppointmentsRequest;
use App\Models\Appointment;
use App\Models\Appointments;
use App\Notifications\AppointmentReminder;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointments::paginate();


        return view('appointments',compact('appointments'));
    }

    public function sendReminder(Appointment $appointment)
    {
        try {
            $appointment->notify(new AppointmentReminder($appointment));
            return back()->with('success', 'Appointment reminder sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send reminder: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'petowner_name' => 'required|string|max:255',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
            'petowner_email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'service_required' => 'required|string|max:255',
        ]);

        $appointment=new Appointment();
        $appointment->petowner_name=$request->petowner_name;
        $appointment->pet_name=$request->pet_name;
        $appointment->pet_type=$request->pet_type;
        $appointment->appointment_date=$request->appointment_date;
        $appointment->appointment_time=$request->appointment_time;
        $appointment->petowner_email=$request->petowner_email;
        $appointment->phone_number=$request->phone_number;
        $appointment->service_required=$request->service_required;

        if ($appointment->save()) {
            try {
                $appointment->notify(new AppointmentReminder($appointment));
                return redirect()->back()->with('success', 'Appointment scheduled successfully!');
            } catch (\Exception $e) {
                // Log the error if needed
                \Log::error('Notification Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Appointment scheduled but notification failed. Please contact support.');
            }
        } else {
            return redirect()->back()->with('error', 'There was a problem scheduling your appointment. Please try again.');
        }
        

        // Create a new appointment in the database
        // $appointment = Appointment::create($validatedData);

        // if ($appointment) {
        //     // Appointment was successfully saved
        //     return redirect()->back()->with('success', 'Appointment scheduled successfully!');
        // } else {
        //     // There was an error saving the appointment
        //     return redirect()->back()->with('error', 'There was a problem scheduling your appointment. Please try again.');
        // }
    }
    public function testAuth()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
         return view('Page.Appoinment');
    }

    public function check()
    {
        // Implement logic to check appointment status
        // This is a placeholder and needs to be implemented based on your requirements
        return view('appointments.check');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentsRequest $request, Appointments $appointments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appointments)
    {
        //
    }

}
