<?
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function store(Request $request, Campaign $campaign)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        $donation = Donation::create([
            'campaign_id' => $campaign->id,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'transaction_id' => uniqid(),
            'payment_status' => 'completed', // Anggap pembayaran langsung berhasil
        ]);

        return redirect()->route('campaigns.show', $campaign->id)
                         ->with('success', 'Donation successful!');
    }
}
