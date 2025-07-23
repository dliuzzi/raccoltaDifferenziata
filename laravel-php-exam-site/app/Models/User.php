<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Service; // Importa il modello Service
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        // aggiungi altri campi se necessario
    ];

    // ... (altri metodi e proprietà già presenti)

    /**
     * Get the services for the user.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
};
