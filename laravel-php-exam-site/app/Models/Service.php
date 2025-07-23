<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Aggiungi questo per permettere l'assegnazione di massa, o specifica i campi fillable
    protected $fillable = [
        'user_id',
        'service_type',
        'description',
        'scheduled_at',
        'status',
    ];

    /**
     * Get the user that owns the service.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}