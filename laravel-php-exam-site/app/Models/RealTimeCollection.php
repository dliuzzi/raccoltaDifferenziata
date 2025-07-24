<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealTimeCollection extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'real_time_collections'; // Specifica il nome della tabella

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'waste_type',
        'collection_area',
        'notes',
        'estimated_completion_time',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // Questa riga è fondamentale per la corretta gestione di date/ore
        'estimated_completion_time' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // Se i tuoi campi `created_at` e `updated_at` NON sono presenti nella tabella,
    // decommenta la seguente riga. Altrimenti, lasciala commentata.
    // public $timestamps = false;
}