<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable // Se usi MustVerifyEmail, lascialo implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'points', // <-- AGGIUNTO QUI: Permette l'assegnazione di massa del campo 'points'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the waste collection services for the user.
     * Questa relazione si riferisce alla tabella 'services'
     */
    public function wasteCollectionServices(): HasMany
    {
        return $this->hasMany(Service::class); // Service::class ora si riferisce ai ritiri rifiuti
    }

    /**
     * Get the reward requests for the user.
     * Questa relazione si riferisce alla nuova tabella 'reward_requests'
     */
    public function rewardRequests(): HasMany
    {
        return $this->hasMany(RewardRequest::class);
    }

    public function services()
    {
        return $this->hasMany(\App\Models\Service::class);
    }

    // Puoi anche mantenere un metodo 'services' che restituisce una collezione unita
    // di entrambi i tipi di servizi, utile se vuoi un'unica lista per la dashboard.
    // Tieni presente che questo carica tutti i dati in memoria e li unisce in PHP.
    public function allUserServices()
    {
        // Recupera i servizi di ritiro rifiuti
        $wasteCollections = $this->wasteCollectionServices;

        // Recupera le richieste di premio
        $rewards = $this->rewardRequests;

        // Unisci le collezioni e ordina per data di creazione, la più recente per prima
        return $wasteCollections->merge($rewards)->sortByDesc('created_at');
    }
}