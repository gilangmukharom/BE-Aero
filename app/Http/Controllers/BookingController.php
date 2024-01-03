<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'passenger_name' => 'required|string',
                'contact_name' => 'required|string',
                'gender' => 'required|string',
                'contact_email' => 'required|email',
            ]);

            $booking = Booking::create($request->all());

            return response()->json(['booking' => $booking], 201);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan dalam pemrosesan pemesanan.'], 500);
        }
    }

    public function findByCustomerAndProduct(Request $request)
    {
        $request->validate([
            'passenger_name' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $passengerName = $request->input('passenger_name');
        $productId = $request->input('product_id');

        $booking = Booking::where('passenger_name', $passengerName)
            ->where('product_id', $productId)
            ->with('product')
            ->first();

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }

    public function getAllPassengers()
    {
        try {
            $passengers = Booking::with('product')->get();
            return response()->json($passengers);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving passengers.'], 500);
        }
    }
}