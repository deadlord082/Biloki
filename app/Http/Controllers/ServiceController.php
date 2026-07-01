<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $services = $query->get();
        $categories = Service::distinct()->pluck('category');

        return view('backoffice.services-additionnels.index', compact('services', 'categories'));
    }

    public function show(Service $service)
    {
        return view('backoffice.services-additionnels.show', compact('service'));
    }

    public function create()
    {
        return view('backoffice.services-additionnels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'pricing_mode' => 'required|string',
            'category' => 'required|string',
            'is_active' => 'boolean',
            'accommodations' => 'array',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('services', 'public');
        }

        $service = Service::create($data);

        if ($request->has('accommodations')) {
            $service->accommodations()->sync($request->accommodations);
        }

        return redirect()->route('services-additionnels.index')->with('success', 'Service créé avec succès!');
    }

    public function edit(Service $service)
    {
        return view('backoffice.services-additionnels.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // Check if it's just a status toggle
        if ($request->has('is_active') && !$request->has('name')) {
            $service->is_active = $request->is_active;
            $service->save();
            return back()->with('success', 'Statut du service mis à jour avec succès!');
        }

        // Regular full update
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'pricing_mode' => 'required|string',
            'category' => 'required|string',
            'is_active' => 'boolean',
            'accommodations' => 'array',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('services', 'public');
        }

        $service->update($data);

        if ($request->has('accommodations')) {
            $service->accommodations()->sync($request->accommodations);
        }

        return redirect()->route('services-additionnels.index')->with('success', 'Service mis à jour avec succès!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services-additionnels.index')->with('success', 'Service supprimé avec succès!');
    }

    public function statistics()
    {
        $totalServicesSold = ServiceSale::count();
        $totalRevenue = ServiceSale::sum(DB::raw('price_at_sale * quantity'));
        
        $services = Service::withCount('sales')->withSum('sales', DB::raw('price_at_sale * quantity'))->get();

        return view('backoffice.services-additionnels.statistics', compact('totalServicesSold', 'totalRevenue', 'services'));
    }
}