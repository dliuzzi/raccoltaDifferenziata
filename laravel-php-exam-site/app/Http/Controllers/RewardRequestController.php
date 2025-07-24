<?php

namespace App\Http\Controllers;

use App\Models\RewardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RewardRequestController extends Controller
{
    // Mappa i premi ai loro costi in punti
    private $rewardCosts = [
        'Buono Sconto 10€ (Eco-Store)' => 100,
        'Pianta da interno' => 150,
        'Kit Borse per Raccolta Differenziata' => 75,
        'Lampadina LED a basso consumo' => 50,
        'Kit di semina per orto urbano' => 120,
        'Buono Carburante 5€' => 80,
        'Abbonamento rivista ecologica (3 mesi)' => 200,
        'Accessorio bici ecologico' => 180,
        'Consulenza risparmio energetico' => 250,
        'Altro (specifica nei dettagli)' => 0, // Punti gestiti a discrezione dell'admin se 0, altrimenti un costo fisso.
    ];

    /**
     * Display a listing of the reward requests.
     */
    public function index()
    {
        $rewardRequests = Auth::user()->rewardRequests()->latest()->get();
        return view('services.premi.index', compact('rewardRequests'));
    }

    /**
     * Show the form for creating a new reward request.
     */
    public function create()
    {
        $userPoints = Auth::user()->points;
        // Passa solo le chiavi (i nomi dei premi) alla vista per il dropdown
        $displayOptions = array_keys($this->rewardCosts);

        return view('services.premi.create', compact('userPoints', 'displayOptions'));
    }

    /**
     * Store a newly created reward request in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati in ingresso
        $validatedData = $request->validate([
            // Valida che il premio scelto sia uno di quelli definiti
            'reward_type' => 'required|string|max:255|in:' . implode(',', array_keys($this->rewardCosts)),
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
            // 'points_redeemed' NON viene più validato come input utente
        ]);

        $user = Auth::user();
        // Determina i punti da riscattare in base al tipo di premio scelto
        $pointsToRedeem = $this->rewardCosts[$validatedData['reward_type']] ?? 0;

        // Gestione speciale per "Altro": se il costo è 0, non sottrarre subito punti.
        // L'admin deciderà i punti in seguito o il premio sarà "gratuito" per una consulenza, ecc.
        if ($validatedData['reward_type'] === 'Altro (specifica nei dettagli)' && $pointsToRedeem === 0) {
            // Non sottraggo punti qui. Il 'points_redeemed' verrà salvato a 0.
            // La logica per i punti di "Altro" sarà gestita esternamente, es. dall'admin.
        } else {
            // Controllo dei punti disponibili per tutti gli altri premi
            if ($user->points < $pointsToRedeem) {
                // Reindirizza indietro con un errore specifico per i punti
                return redirect()->back()->withErrors(['points_redeemed' => 'Non hai abbastanza punti ecologici per riscattare questo premio. Punti disponibili: ' . $user->points])->withInput();
            }

            // Decrementa i punti dell'utente
            $user->points -= $pointsToRedeem;
            $user->save(); // Salva il nuovo saldo punti dell'utente
        }

        // Crea la nuova richiesta di premio usando i dati validati
        // e i punti determinati dal premio scelto
        $rewardRequest = $user->rewardRequests()->create([
            'reward_type' => $validatedData['reward_type'],
            'description' => $validatedData['description'],
            'scheduled_at' => $validatedData['scheduled_at'],
            'status' => 'in attesa', // Stato iniziale
            'points_redeemed' => $pointsToRedeem, // Salva i punti effettivi riscattati
        ]);

        return redirect()->route('reward_requests.index')->with('success', 'Richiesta premio inviata con successo!');
    }

    /**
     * Display the specified reward request.
     */
    public function show(RewardRequest $rewardRequest)
    {
        if (Auth::id() !== $rewardRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('services.premi.show', compact('rewardRequest'));
    }

    /**
     * Show the form for editing the specified reward request.
     */
    public function edit(RewardRequest $rewardRequest)
    {
        if (Auth::id() !== $rewardRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }
        // Passa solo le chiavi (i nomi dei premi) alla vista per il dropdown
        $displayOptions = array_keys($this->rewardCosts);
        $userPoints = Auth::user()->points;
        return view('services.premi.edit', compact('rewardRequest', 'displayOptions', 'userPoints'));
    }

    /**
     * Update the specified reward request in storage.
     */
    public function update(Request $request, RewardRequest $rewardRequest)
    {
        if (Auth::id() !== $rewardRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'reward_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'nullable|date',
            'status' => 'required|string|max:255',
            // 'points_redeemed' qui può rimanere nella validazione se l'admin può modificarlo
            // ma ricorda che un cambio qui non rimborserebbe/sottrarrebbe punti all'utente automaticamente.
            'points_redeemed' => 'required|integer|min:0', // Questo campo è per l'admin
        ]);

        // NOTA: La logica per riaggiustare i punti dell'utente in caso di modifica
        // di 'points_redeemed' in una richiesta esistente è complessa e non è inclusa qui.
        // Per ora, l'aggiornamento si limita ai campi della richiesta.
        // Se un utente cambia i punti riscattati, dovresti implementare una logica
        // per rimborsare/sottrarre la differenza dal saldo punti dell'utente.

        $rewardRequest->update($validatedData);

        return redirect()->route('reward_requests.index')->with('success', 'Richiesta premio aggiornata con successo!');
    }


    /**
     * Remove the specified reward request from storage.
     */
    public function destroy(RewardRequest $rewardRequest)
    {
        if (Auth::id() !== $rewardRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // OPZIONALE: Se elimini una richiesta, potresti voler rimborsare i punti all'utente.
        // È una buona pratica rimborsare i punti se la richiesta non è stata "risolta" o "completata".
        if ($rewardRequest->status !== 'risolto' && $rewardRequest->status !== 'completato') {
             $user = $rewardRequest->user; // Usa la relazione per prendere l'utente
             $user->points += $rewardRequest->points_redeemed;
             $user->save();
        }

        $rewardRequest->delete();

        return redirect()->route('reward_requests.index')->with('success', 'Richiesta premio eliminata con successo!');
    }
}