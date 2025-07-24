<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RewardRequest extends Model
{
    use HasFactory;

    protected $table = 'reward_requests';

    protected $fillable = [
        'user_id',
        'service_id',
        'service_type',
        'reward_type',
        'description',
        'scheduled_at',
        'status',
        'points_redeemed', // <-- AGGIUNTO QUI
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'service_id' => 'integer',
        'points_redeemed' => 'integer', // <-- AGGIUNTO QUI per il casting
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}