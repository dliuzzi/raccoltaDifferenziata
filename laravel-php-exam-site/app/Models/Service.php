<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importa BelongsTo

class Service extends Model
{
    use HasFactory;

    // Specifica il nome della tabella se non segue la convenzione (ma 'services' è il default per 'Service')
    protected $table = 'services';

    protected $fillable = [
        'user_id',
        'service_id',      // 0 per regolare, 1 per ingombranti
        'service_type',    // Es. "Ritiro regolare dei rifiuti"
        'description',
        'scheduled_at',
        'status',          // 'in corso', 'risolto', etc.
        'kilograms_collected', // <-- AGGIUNTO QUI: Per i kg raccolti
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'service_id' => 'integer',
        'kilograms_collected' => 'integer', // <-- AGGIUNTO QUI per il casting
    ];

    public function user(): BelongsTo // Tipo di ritorno per chiarezza
    {
        return $this->belongsTo(User::class);
    }
}