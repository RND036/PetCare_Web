<?php
namespace App\Http\Controllers;

use App\Models\PetDetails;
use Illuminate\Http\Request;

class PetDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petdetails = PetDetails::paginate();

        return view('petdetails.index', compact('petdetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'pet_breed' => 'required|string|max:255',
            'pet_gender' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
            'pet_picture' => 'nullable|image|max:2048',
        ]);

        // Get the authenticated user and their PetOwner record
        $user = auth()->user();
        $petOwner = $user->petOwner; // Ensure the user has an associated PetOwner record

        if (!$petOwner) {
            return redirect()->back()->withErrors('Pet Owner information is missing.');
        }

        // Create the PetDetails record with pet_owner_id
        PetDetails::create(array_merge($validated, ['pet_owner_id' => $petOwner->id]));

        return redirect()->route('petdetails.index')->with('success', 'Pet details saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petdetails = PetDetails::findOrFail($id);
        return view('petdetails.show', compact('petdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petdetails = PetDetails::findOrFail($id);
        return view('petdetails.edit', compact('petdetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'pet_breed' => 'required|string|max:255',
            'pet_gender' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
            'pet_picture' => 'nullable|image|max:2048',
        ]);

        // Find the PetDetails record
        $petdetails = PetDetails::findOrFail($id);

        // Update the PetDetails record
        $petdetails->update($validated);

        return redirect()->route('petdetails.index')->with('success', 'Pet details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the PetDetails record
        $petdetails = PetDetails::findOrFail($id);

        // Delete the PetDetails record
        $petdetails->delete();

        return redirect()->route('petdetails.index')->with('success', 'Pet details deleted successfully.');
    }
}
