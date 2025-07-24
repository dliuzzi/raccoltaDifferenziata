<?php

namespace App\Http\Controllers;

use App\Models\Service; // Assicurati che questo sia il modello corretto per i servizi di raccolta
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Necessario per Carbon::now()

class ServiceController extends Controller
{
    /**
     * Display a listing of the waste collection services.
     */
    public function index()
    {
        // Recupera solo i servizi dell'utente autenticato
        // Assicurati che il modello User abbia la relazione 'services()' definita come hasMany(Service::class)
        $services = Auth::user()->services()->latest()->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new waste collection service.
     */
    public function create(Request $request) // Abbiamo bisogno di Request qui per i parametri della query
    {
        // Recupera i parametri pre-selezionati dall'URL (dal bottone cliccato)
        $preselectedServiceType = $request->query('service_type', '');
        $preselectedServiceId = $request->query('service_id');

        // Genera la data e ora attuali per il campo scheduled_at
        // Formatta per l'input type="datetime-local" (YYYY-MM-DDTHH:MM)
        // Se non c'è un valore pre-selezionato, usa l'ora attuale
        $preselectedScheduledAt = Carbon::now()->format('Y-m-d\TH:i');

        // Passa queste variabili alla vista
        return view('services.create', compact('preselectedServiceType', 'preselectedServiceId', 'preselectedScheduledAt'));
    }

    /**
     * Store a newly created waste collection service in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati in ingresso
        // Ho aggiunto 'service_id' alla validazione, essenziale perché viene inviato
        // e 'scheduled_at' come required
        $validatedData = $request->validate([
            // 'service_type' è richiesto dal form (campo hidden)
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'scheduled_at' dovrebbe essere sempre presente e una data valida
            'scheduled_at' => 'required|date',
            // 'status' viene impostato a 'in attesa' nel controller, non dal form
            // 'status' => 'nullable|string|max:255', // Rimosso se non vuoi venga dal form
            
            // service_id è l'ID del tipo di servizio (es. 1, 2)
            // Assicurati che 'services' nel `exists` sia la tabella corretta
            // che contiene gli ID dei tipi di servizio. Spesso è una tabella 'service_types'.
            'service_id' => 'required|integer', // RIMOSSA LA VALIDAZIONE exists
        ]);

        // Crea un nuovo servizio associandolo all'utente autenticato
        // Qui mappiamo i campi del form ai campi della tabella 'services'
        Auth::user()->services()->create([
            'service_type' => $validatedData['service_type'],
            'description' => $validatedData['description'],
            'scheduled_at' => $validatedData['scheduled_at'],
            'status' => 'in attesa', // Imposta uno stato iniziale fisso
            'service_id' => $validatedData['service_id'], // Usa l'ID passato dal form
            // Nota: Se nel tuo modello 'Service' la colonna per l'ID del tipo di servizio
            // si chiama 'service_type_id', dovrai mapparla qui: 'service_type_id' => $validatedData['service_id']
            // oppure cambiare il 'name' dell'input hidden nel form a 'service_type_id'.
            // Per ora, seguo la tua struttura di avere 'service_id' direttamente nella tabella Service.
        ]);

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
            // Aggiungi 'service_id' anche qui se lo aggiorni o lo validi
            'service_id' => 'required|integer|exists:services,id',
            // 'kilograms_collected' => 'nullable|integer|min:0', // Rimosso se non gestisci i premi qui
        ]);

        // Non c'è logica per i punti/premi qui, in base alla tua richiesta.
        // Se in futuro vuoi aggiungere la logica per i punti, dovrai ripristinarla.

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