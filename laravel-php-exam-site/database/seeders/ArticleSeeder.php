<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article; // Assicurati di importare il modello Article
use Carbon\Carbon;      // Per gestire le date

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pulisci la tabella prima di popolare (opzionale, utile per test ripetuti)
        Article::truncate();

        $articles = [
            [
                'title' => 'L\'Importanza della Raccolta Differenziata',
                'date' => Carbon::now()->subDays(5)->toDateString(),
                'text' => 'La raccolta differenziata è un pilastro fondamentale per la sostenibilità ambientale. Separando i rifiuti alla fonte, contribuiamo a ridurre l\'inquinamento, a risparmiare risorse naturali e a produrre meno rifiuti da smaltire in discarica. Ogni piccolo gesto conta, dal vetro alla carta, dalla plastica all\'organico. Adottare queste pratiche nella vita quotidiana non solo supporta l\'ambiente, ma promuove anche un\'economia circolare, dove i materiali vengono riutilizzati e riciclati, riducendo la necessità di nuove estrazioni.',
                'image' => 'images/article_1.jpg', // Percorso immagine di esempio
            ],
            [
                'title' => 'Come Funziona il Compostaggio Domestico',
                'date' => Carbon::now()->subDays(10)->toDateString(),
                'text' => 'Il compostaggio domestico è un modo eccellente per trasformare gli scarti organici della cucina e del giardino in un prezioso fertilizzante naturale. Questo processo riduce notevolmente la quantità di rifiuti destinati all\'inceneritore e arricchisce il terreno in modo sostenibile. Impara quali materiali sono adatti al compostaggio, come mantenere il tuo compostiera e come utilizzare il compost maturo per migliorare la salute delle tue piante e del tuo giardino.',
                'image' => 'images/article_2.jpg',
            ],
            [
                'title' => 'L\'Impatto dei Rifiuti Elettronici (RAEE)',
                'date' => Carbon::now()->subDays(15)->toDateString(),
                'text' => 'I Rifiuti di Apparecchiature Elettriche ed Elettroniche (RAEE) rappresentano una sfida crescente per l\'ambiente a causa delle sostanze nocive che contengono. Tuttavia, sono anche una fonte ricca di materiali preziosi come oro, argento e rame. Questo articolo esplora l\'importanza del corretto smaltimento dei RAEE e come il riciclo responsabile possa mitigare i rischi ambientali e recuperare risorse vitali per l\'industria, contribuendo a un futuro più sostenibile e meno dipendente dall\'estrazione mineraria.',
                'image' => 'images/article_3.jpg',
            ],
            [
                'title' => 'Acqua e Sostenibilità: Ogni Goccia Conta',
                'date' => Carbon::now()->subDays(20)->toDateString(),
                'text' => 'L\'acqua è una risorsa preziosa e limitata, la cui gestione sostenibile è cruciale per il futuro del nostro pianeta. Dalla riduzione dello spreco idrico nelle case all\'adozione di pratiche agricole più efficienti, ogni azione può fare la differenza. Questo articolo esamina come le piccole abitudini quotidiane e le grandi iniziative possano contribuire alla conservazione dell\'acqua, garantendo la disponibilità per le generazioni future e supportando gli ecosistemi che dipendono da essa.',
                'image' => null, // Immagine non obbligatoria
            ],
            [
                'title' => 'Energia Rinnovabile: Il Futuro è Verde',
                'date' => Carbon::now()->subDays(25)->toDateString(),
                'text' => 'Le energie rinnovabili sono la chiave per un futuro energetico pulito e sostenibile. Dal solare all\'eolico, dall\'idroelettrico alla geotermia, queste fonti di energia non esauribili offrono un\'alternativa ai combustibili fossili, riducendo le emissioni di gas serra e contrastando il cambiamento climatico. Scopri come l\'innovazione sta rendendo le energie rinnovabili sempre più accessibili ed efficienti, aprendo la strada a un\'indipendenza energetica globale.',
                'image' => 'images/article_4.jpg',
            ],
            [
                'title' => 'Ridurre, Riutilizzare, Riciclare: Le 3 R della Sostenibilità',
                'date' => Carbon::now()->subDays(30)->toDateString(),
                'text' => 'Le "Tre R" sono i principi guida della sostenibilità: Ridurre il consumo, Riutilizzare gli oggetti il più possibile e Riciclare i materiali quando non possono essere riutilizzati. Questo approccio circolare minimizza l\'impatto ambientale delle nostre abitudini di consumo, promuovendo un uso più responsabile delle risorse e riducendo la quantità di rifiuti che produciamo, contribuendo a un ecosistema più sano e a un futuro più equilibrato.',
                'image' => null,
            ],
            [
                'title' => 'I Benefici delle Aree Verdi Urbane',
                'date' => Carbon::now()->subDays(35)->toDateString(),
                'text' => 'Le aree verdi all\'interno delle città non sono solo esteticamente gradevoli, ma offrono numerosi benefici ambientali e sociali. Aiutano a migliorare la qualità dell\'aria, a ridurre l\'effetto "isola di calore", a gestire il drenaggio delle acque piovane e a fornire habitat per la fauna selvatica. Inoltre, promuovono il benessere fisico e mentale dei cittadini, creando spazi per la ricreazione e la socializzazione, essenziali per una vita urbana equilibrata.',
                'image' => 'images/article_5.jpg',
            ],
            [
                'title' => 'Mobilità Sostenibile: Muoviti in Modo Ecologico',
                'date' => Carbon::now()->subDays(40)->toDateString(),
                'text' => 'La mobilità sostenibile è fondamentale per ridurre l\'inquinamento atmosferico e acustico nelle nostre città. Dalle biciclette ai veicoli elettrici, dai trasporti pubblici efficienti alla condivisione dell\'auto, esistono molteplici opzioni per spostarsi in modo ecologico. Adottare queste alternative non solo contribuisce a un ambiente più pulito, ma migliora anche la qualità della vita urbana, rendendo le città più vivibili e meno congestionate.',
                'image' => null,
            ],
        ];

        foreach ($articles as $articleData) {
            Article::create($articleData);
        }
    }
}