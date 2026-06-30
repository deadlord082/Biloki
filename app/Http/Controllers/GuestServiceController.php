<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSale;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class GuestServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        return view('guest.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $reviews = $service->reviews()->latest()->get();
        $averageRating = $service->reviews()->avg('rating') ?? 0;
        return view('guest.services.show', compact('service', 'reviews', 'averageRating'));
    }

    public function checkout(Service $service)
    {
        return view('guest.services.checkout', compact('service'));
    }

    public function processCheckout(Request $request, Service $service)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = $service->price * $request->quantity;

        $sale = ServiceSale::create([
            'service_id' => $service->id,
            'price_at_sale' => $service->price,
            'quantity' => $request->quantity,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'sale_date' => now(),
        ]);

        // Send confirmation email (placeholder)
        // Mail::to($request->guest_email)->send(new \App\Mail\ServiceSaleConfirmation($sale));

        return redirect()->route('guest.services.confirmation', $sale)->with('success', 'Paiement réussi !');
    }

    public function confirmation(ServiceSale $sale)
    {
        return view('guest.services.confirmation', compact('sale'));
    }

    public function reviewForm(Service $service)
    {
        return view('guest.services.review', compact('service'));
    }

    public function submitReview(Request $request, Service $service)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'service_id' => $service->id,
            'guest_name' => $request->guest_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('guest.services.show', $service)->with('success', 'Merci pour votre avis !');
    }
}