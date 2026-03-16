<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'phone'    => 'required|string|max:30',
            'email'    => 'required|email|max:150',
            'vehicle'  => 'nullable|string|max:150',
            'service'  => 'required|string|max:100',
            'location' => 'required|string|max:80',
            'requests' => 'nullable|string|max:600',
        ]);

        Appointment::create([
            'customer_name'       => $validated['name'],
            'customer_email'      => $validated['email'],
            'customer_phone'      => $validated['phone'],
            'vehicle'             => $validated['vehicle'] ?? null,
            'location_preference' => $validated['location'],
            'appointment_date'    => now()->addDay()->format('Y-m-d'),
            'appointment_time'    => '09:00',
            'notes'               => trim("Service: {$validated['service']}\n" . ($validated['requests'] ?? '')),
            'status'              => 'pending',
        ]);

        return response()->json(['message' => 'Build request received. We\'ll be in touch!'], 201);
    }
}
