<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create($vehicle_id)
    {
        $vehicle = Product::findOrFail($vehicle_id);
        
        return view('booknow', compact('vehicle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_end_date' => 'required|date|after:booking_date',
        ]);

        // File Upload
        $filePath = $request->file('file')->store('documents', 'public');

        // Fetch product details
        $product = Product::findOrFail($request->product_id);

        // Calculate number of days
        $startDate = Carbon::parse($request->booking_date);
        $endDate = Carbon::parse($request->booking_end_date);
        $days = $startDate->diffInDays($endDate);

        // Get price per day (if available in Product)
        $pricePerDay = $product->price_per_day ?? 100;
        $totalAmount = $days * $pricePerDay;

        // Create Booking
        Booking::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'file' => $filePath,
            'booking_date' => $request->booking_date,
            'booking_end_date' => $request->booking_end_date,
            'amount' => $totalAmount,
            'status' => 'incomplete',
        ]);

        return redirect()->route('deals')->with('success', 'Vehicle booked successfully!');
    }

    public function calculatePrice(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_end_date' => 'required|date|after:booking_date',
        ]);
    
        $product = Product::findOrFail($request->product_id);
        
        // Calculate days
        $startDate = Carbon::parse($request->booking_date);
        $endDate = Carbon::parse($request->booking_end_date);
        $days = $startDate->diffInDays($endDate);
    
        // Calculate amount
        $pricePerDay = $product->price_per_day ?? 100;
        $totalAmount = $days * $pricePerDay;
    
        return response()->json(['amount' => $totalAmount]);
    }
    
}
    