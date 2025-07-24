<?php

namespace App\Http\Controllers;

use App\Models\Service; // Questo modello Service ora si riferisce ai ritiri rifiuti
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Importa il modello User per aggiornare i punti

class ServiceController extends Controller
{
    /**
     * Display a listing of the waste collection services.
     */
    public function index()
    {
        // Recupera solo i servizi di ritiro rifiuti dell'utente autenticato
        // NOTA: Usiamo la nuova relazione 'wasteCollectionServices()' definita nel modello User
        $services = Auth::user()->wasteCollectionServices()->latest()->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new waste collection service.
     */
    public function create(Request $request)
    {
        $preselectedServiceType = '';
        $preselectedServiceId = null;

        // Leggi il parametro 'type' dall'URL
        $type = $request->query('type');

        // Imposta il valore predefinito in base al parametro 'type'
        switch ($type) {
            case 'regolare':
                $preselectedServiceType = 'Ritiro regolare dei rifiuti';
                $preselectedServiceId = 0; // Mappa al service_id 0
                break;
            case 'occasionale':
                $preselectedServiceType = 'Ritiro occasionale di rifiuti e ingombranti';
                $preselectedServiceId = 1; // Mappa al service_id 1
                break;
            // IL CASO 'premi' È STATO RIMOSSO DA QUI, ora è gestito dal RewardRequestController
            default:
                $preselectedServiceType = '';
                $preselectedServiceId = null;
                break;
        }

        return view('services.create', compact('preselectedServiceType', 'preselectedServiceId'));
    }

    /**
     * Store a newly created waste collection service in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati in ingresso
        $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
            'service_id' => 'required|integer|min:0|max:1', // service_id ora solo 0 o 1
            // LA VALIDAZIONE PER 'reward_type' È STATA RIMOSSA QUI
        ]);

        // Prepara i dati per la creazione
        // Lo stato è 'in corso' come richiesto
        $dataToCreate = array_merge($request->all(), ['status' => 'in corso']);

        // Logica per assegnare 'service_id' basandosi su 'service_type' (utile come fallback)
        if (!isset($dataToCreate['service_id']) || is_null($dataToCreate['service_id'])) {
             switch ($dataToCreate['service_type']) {
                case 'Ritiro regolare dei rifiuti':
                    $dataToCreate['service_id'] = 0;
                    break;
                case 'Ritiro occasionale di rifiuti e ingombranti':
                    $dataToCreate['service_id'] = 1;
                    break;
                // LA LOGICA PER 'Richiesta premi ecologici' È STATA RIMOSSA QUI
            }
        }

        // NOTA: Usiamo la nuova relazione 'wasteCollectionServices()' definita nel modello User
        Auth::user()->wasteCollectionServices()->create($dataToCreate);

        return redirect()->route('services.index')->with('success', 'Servizio di ritiro rifiuti richiesto con successo!');
    }

    /**
     * Display the specified waste collection service.
     */
    public function show(Service $service)
    {
        // Assicurati che l'utente possa vedere solo i propri servizi di ritiro
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified waste collection service.
     */
    public function edit(Service $service)
    {
        // Assicurati che l'utente possa modificare solo i propri servizi di ritiro
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified waste collection service in storage.
     */
    public function update(Request $request, Service $service)
    {
        // Assicurati che l'utente possa aggiornare solo i propri servizi di ritiro
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
            'status' => 'required|string|max:255',
            'service_id' => 'required|integer|min:0|max:1', // service_id ora solo 0 o 1
            // Aggiungi la validazione per i kg raccolti. Questo campo sarà inserito dall'admin.
            'kilograms_collected' => 'nullable|integer|min:0',
        ]);

        // --- LOGICA PER L'ASSEGNAZIONE DEI PUNTI ---
        // Controlla se lo stato è cambiato in 'risolto'
        // E se il servizio era precedentemente in uno stato diverso da 'risolto'
        // E se si tratta di un servizio di ritiro (service_id 0 o 1)
        if ($service->status !== 'risolto' && $validatedData['status'] === 'risolto' && ($service->service_id === 0 || $service->service_id === 1)) {
            $kilograms = $validatedData['kilograms_collected'] ?? 0; // Prendi i kg dall'input, default 0 se non forniti
            $pointsEarned = floor($kilograms / 10); // Esempio: 1 punto ogni 10 kg

            $user = $service->user; // Recupera l'utente associato a questo servizio
            $user->points += $pointsEarned; // Aggiungi i punti
            $user->save(); // Salva il nuovo saldo punti dell'utente
        }
        // --- FINE LOGICA PUNTI ---

        $service->update($validatedData); // Aggiorna il servizio con i dati validati

        return redirect()->route('services.index')->with('success', 'Servizio di ritiro rifiuti aggiornato con successo!');
    }

    /**
     * Remove the specified waste collection service from storage.
     */
    public function destroy(Service $service)
    {
        // Assicurati che l'utente possa eliminare solo i propri servizi di ritiro
        if (Auth::id() !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servizio di ritiro rifiuti eliminato con successo!');
    }

    // IL METODO public function createPremi() È STATO COMPLETAMENTE RIMOSSO DA QUESTO CONTROLLER.
    // Ora è gestito nel RewardRequestController.
}