<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ArticleSeeder; // Importa il tuo seeder degli articoli

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Questo crea un utente di test singolo. Puoi anche usare User::factory(10)->create();
        // per creare 10 utenti fittizi, se necessario.
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Aggiunto una password di default per il test user
            'points' => 1000, // Dai alcuni punti iniziali per testare i premi
        ]);

        // Chiama il seeder per popolare la tabella 'articles' con i dati di esempio.
        $this->call(ArticleSeeder::class);

        // Se hai altri seeder (es. per popolazioni di dati iniziali per servizi, ecc.),
        // puoi aggiungerli qui:
        // $this->call(YourOtherSeeder::class);
    }
}