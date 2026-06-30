<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('backoffice.services-additionnels.index', compact('services'));
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
            'price' => 'required|numeric|min:0',
            'pricing_mode' => 'required|string',
            'category' => 'required|string',
            'is_active' => 'required',
        ]);

        $request->merge(['is_active' => $request->has('is_active') ?? true]);

        Service::create($request->all());

        return redirect()->route('services-additionnels.index')->with('success', 'Service créé avec succès!');
    }

    public function edit(Service $service)
    {
        return view('backoffice.services-additionnels.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'pricing_mode' => 'required|string',
            'category' => 'required|string',
            'is_active' => 'required',
        ]);

        $request->merge(['is_active' => $request->has('is_active') ?? true]);

        $service->update($request->all());

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