<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Vehicle;
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
            'amount' => 'required|numeric|min:0',
        ]);

        // File Upload
        $filePath = $request->file('file')->store('documents', 'public');

        Booking::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'file' => $filePath,
            'booking_date' => $request->booking_date,
            'booking_end_date' => $request->booking_end_date,
            'amount' => $request->amount, // Ensure the amount is set dynamically
            'status' => 'incomplete',
        ]);

        return redirect()->route('deals')->with('success', 'Vehicle booked successfully!');
    }
}
