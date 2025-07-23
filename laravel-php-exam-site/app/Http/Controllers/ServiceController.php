<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        // Recupera solo i servizi dell'utente autenticato
        $services = Auth::user()->services()->latest()->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati in ingresso
        $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
            'status' => 'nullable|string|max:255',
        ]);

        // Crea un nuovo servizio associandolo all'utente autenticato
        Auth::user()->services()->create($request->all());

        return redirect()->route('services.index')->with('success', 'Servizio richiesto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        // Assicurati che l'utente possa vedere solo i propri servizi
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // Assicurati che l'utente possa modificare solo i propri servizi
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        // Assicurati che l'utente possa aggiornare solo i propri servizi
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
            'status' => 'nullable|string|max:255',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Servizio aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Assicurati che l'utente possa eliminare solo i propri servizi
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servizio eliminato con successo!');
    }
}
