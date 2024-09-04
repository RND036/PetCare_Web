<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class QrCodeController extends Controller
{
    public function showQRCode()
    {
        $user = auth()->user();
        
        // Fetch the associated PetOwner and their pet details
        $petOwner = $user->petOwner()->with(['petDetails.vaccinations'])->first();
        
        if ($petOwner) {
            $qrData = [
                'PetCare' => 'PetCare Application ',
                'Owner Information' => [
                    'Name' => $petOwner->petowners_name ?? 'No Pet Owner Information Available',
                    'Phone' => $petOwner->petowners_phone ?? '',
                    'Email' => $petOwner->petowners_email ?? '',
                ],
                'Pet Details' => [
                    'Name' => $petOwner->petDetails->first()->pet_name ?? 'No Pet Details Available',
                    'Type' => $petOwner->petDetails->first()->pet_breed ?? '',
                ],
                'Vaccination Details' => $this->formatVaccinationDetails($petOwner->petDetails->first())
            ];
    
            // Format QR content
            $qrContent = $this->formatQrContent($qrData);

            // Generate QR Code
            $qrCode = QrCode::size(200)->generate($qrContent);
        } else {
            // Handle the case where no pet owner is found
            $qrCode = 'No Pet Owner Information Available';
        }
    
        // Pass the QR code to the view
        return view('livewire.qr-code', compact('qrCode'));
    }

    private function formatVaccinationDetails($petDetails)
    {
        if (!$petDetails) {
            return 'No Vaccination Records Available';
        }

        $vaccinationTable = "Vaccine Name | Administered Date | Expiry Date | Next Due Date\n";
        $vaccinationTable .= "--------------------------------------------------------\n";
        
        $vaccinations = $petDetails->vaccinations;
        if ($vaccinations->isNotEmpty()) {
            foreach ($vaccinations as $vaccination) {
                $vaccinationTable .= sprintf(
                    "%s | %s | %s | %s\n",
                    $vaccination->vaccine_name ?? 'N/A',
                    $vaccination->date_administered 
                        ? (is_string($vaccination->date_administered) 
                            ? Carbon::parse($vaccination->date_administered)->format('Y-m-d') 
                            : $vaccination->date_administered->format('Y-m-d'))
                        : 'N/A',
                    $vaccination->vaccination_exp_date 
                        ? (is_string($vaccination->vaccination_exp_date) 
                            ? Carbon::parse($vaccination->vaccination_exp_date)->format('Y-m-d') 
                            : $vaccination->vaccination_exp_date->format('Y-m-d'))
                        : 'N/A',
                    $vaccination->next_due_date 
                        ? (is_string($vaccination->next_due_date) 
                            ? Carbon::parse($vaccination->next_due_date)->format('Y-m-d') 
                            : $vaccination->next_due_date->format('Y-m-d'))
                        : 'N/A'
                );
            }
        } else {
            $vaccinationTable .= "No Vaccination Records Available\n";
        }

        return $vaccinationTable;
    }

    private function formatQrContent($data)
    {
        $content = '';
        foreach ($data as $sectionTitle => $sectionContent) {
            $content .= "$sectionTitle:\n";
            if (is_array($sectionContent)) {
                foreach ($sectionContent as $key => $value) {
                    $content .= "$key: $value\n";
                }
            } else {
                $content .= "$sectionContent\n";
            }
            $content .= "\n";
        }
        return $content;
    }
}
