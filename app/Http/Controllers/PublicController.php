<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\comment;
use App\Models\Campaign;
use App\Models\Donation;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(Request $request)
    {
     
    
        // Query data berdasarkan input search dan status 'active'
        $searchResults = Campaign::query()
            ->where('status', 'active'); // Hanya campaign yang berstatus active
    
        // Ambil data rekomendasi dari tabel campaigns yang berstatus active
        $campaigns = Campaign::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    
        $totalDonations = Campaign::where('status', 'active')->sum('collected_amount'); // Hanya menghitung dari campaign active
        $totalProjects = Campaign::where('status', 'active')->count();
        $projectsDone = Campaign::where('status', 'completed')->count(); // Tetap hitung campaign dengan status 'completed'
    
        $today = Carbon::now();
        $urgent = Campaign::where('status', 'active') // Hanya campaign active yang mendekati batas waktu
            ->whereDate('end_date', '<=', $today->addDays(7))
            ->get();
    
        $comments = Comment::with('user') // Mengambil data user yang terkait
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('public.dashboard', compact('campaigns', 'comments', 'urgent', 'totalDonations', 'totalProjects', 'projectsDone', 'searchResults'));
    }
    

    public function show($id)
{
    // Ambil campaign berdasarkan ID
    $campaign = Campaign::withCount(['donations as donations_count' => function ($query) {
        $query->selectRaw('COUNT(DISTINCT user_id)');
    }])->findOrFail($id);
    $komen = Comment::all();

    

    return view('public.campaign_detail', compact('campaign','komen'));
}



public function like($id, Request $request)
{
    $comment = Comment::findOrFail($id);

    // Memastikan pengguna tidak bisa like lebih dari sekali (gunakan session atau user ID)
    $userId = $request->user()->id; // Atau gunakan session ID jika tidak ada autentikasi
    $likedUsers = $comment->liked_by_users ? json_decode($comment->liked_by_users, true) : [];

    if (in_array($userId, $likedUsers)) {
        return response()->json(['message' => 'Already liked'], 400);
    }

    // Tambahkan user ID ke array liked_by_users
    $likedUsers[] = $userId;

    // Update jumlah likes dan liked_by_users
    $comment->update([
        'likes' => $comment->likes + 1,
        'liked_by_users' => json_encode($likedUsers),
    ]);

    return response()->json(['likes' => $comment->likes]);
}

//all kategori

public function campaignsByType($type = null) {
    // Filter data berdasarkan tipe, jika diberikan, dan hanya yang berstatus active
    $campaigns = $type 
        ? Campaign::where('type', $type)->where('status', 'active')->get() 
        : Campaign::where('status', 'active')->get();

    return view('public.SemuaCampaign.allcampaign', compact('campaigns', 'type'));
}


public function allurgent() {
    $today = Carbon::now();
    $urgent = Campaign::where('status', 'active') // Hanya campaign dengan status active
        ->whereDate('end_date', '<=', $today->addDays(7))
        ->get();

    return view('public.SemuaCampaign.allurgent', compact('urgent'));
}


public function mydonation(){
    
    $pendingDonations =  Donation::where('payment_status', 'pending')->get();

return view('public.mydonation', compact('pendingDonations'));

}

public function store(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1000',
        'message' => 'nullable|string|max:255',
    ]);

    DB::transaction(function () use ($request) {
        Donation::create([
            'campaign_id' => $request->campaign_id,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'payment_status' => 'pending', // Default status
            'payment_method' => 'manual',
            'transaction_id' => Str::uuid(),
        ]);
    });

    return redirect()->route('mydonation');
}




public function processPayment($id)
{
    // Ambil data donasi berdasarkan ID
    $donation = Donation::with('campaign')->findOrFail($id);

    // Data yang akan dikirim ke Midtrans
    $transactionDetails = [
        'order_id' => 'DON-' . $donation->id,
        'gross_amount' => $donation->amount,
    ];

    $itemDetails = [
        [
            'id' => 'DON-' . $donation->id,
            'price' => $donation->amount,
            'quantity' => 1,
            'name' => $donation->campaign->title,
        ]
    ];

    $customerDetails = [
        'first_name' => auth()->user()->name,
        'email' => auth()->user()->email,
    ];

    $snapParams = [
        'transaction_details' => $transactionDetails,
        'item_details' => $itemDetails,
        'customer_details' => $customerDetails,
    ];

    // Buat transaksi menggunakan Snap
    $snapToken = Snap::getSnapToken($snapParams);

    // Simpan transaction_id di database
    $donation->transaction_id = $transactionDetails['order_id'];
    $donation->payment_status = 'pending'; // Awal status 'pending'
    $donation->save();

    return response()->json([
        'snap_token' => $snapToken,
    ]);
}






public function handleCallback(Request $request)
{
    try {
        // Inisialisasi Midtrans Notification untuk mengambil data transaksi
        $notif = new Notification();

        // Ambil transaction_id dan status dari notifikasi
        $transactionId = $notif->order_id; // Menggunakan `order_id`
        $status = $notif->transaction_status;

        // Cari donasi berdasarkan transaction_id
        $donation = Donation::where('transaction_id', $transactionId)->first();

        if ($donation) {
            if ($status === 'settlement') {
                $donation->payment_status = 'completed';
            } elseif ($status === 'pending') {
                $donation->payment_status = 'pending';
            } elseif ($status === 'deny' || $status === 'cancel') {
                $donation->payment_status = 'failed';
            }

            // Simpan perubahan status pembayaran
            $donation->save();

            return response()->json(['message' => 'Status pembayaran berhasil diperbarui.']);
        }

        return response()->json(['message' => 'Donasi tidak ditemukan.'], 404);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Terjadi kesalahan.', 'error' => $e->getMessage()], 500);
    }

    \Log::info('Callback data:', $request->all());

}







public function updateStatus(Request $request)
{
    // Validasi data yang diterima
    $request->validate([
        'transaction_id' => 'required|string',
    ]);

    // Cari donasi berdasarkan transaction_id
    $donation = Donation::where('transaction_id', $request->transaction_id)->first();

    if ($donation) {
        // Perbarui status pembayaran menjadi 'completed'
        $donation->payment_status = 'completed';
        $donation->save();

        return response()->json(['message' => 'Status pembayaran berhasil diperbarui.']);
    } else {
        return response()->json(['message' => 'Donasi tidak ditemukan.'], 404);
    }
}






}
