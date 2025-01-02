<?
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
// app/Http/Controllers/DonationController.php
public function markAsCompleted(Donation $donation)
{
    // Ensure the donation is in pending status
    if ($donation->payment_status === 'pending') {
        $donation->update(['payment_status' => 'completed']);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Donation marked as completed successfully.'
    ]);
}

}
