# Progetto Raccolta Differenziata

## Descrizione
Piattaforma web per incentivare la raccolta differenziata tramite sistema di punti e premi. Gli utenti possono registrarsi, visualizzare la propria dashboard, richiedere servizi di ritiro rifiuti e convertire i punti accumulati in premi.

## Struttura del Sistema

### Componenti Principali
- Frontend: pagine Home, Login, About Us
- Backend: gestione autenticazione e logica business
- Database: archivio utenti, servizi e statistiche

### Entità
**Utenti**: dati anagrafici, punti, data registrazione
**Servizi**: ritiri rifiuti, orari, centri raccolta
**Smaltimento**: tipologia rifiuti, volumi, zone raccolta

### Relazioni
- Utenti e Servizi: molti a molti
- Servizi e Smaltimento: molti a uno

## Funzionalità
- Registrazione e login utenti
- Dashboard personalizzata con punti/premi
- Richiesta servizi di raccolta
- Conversione punti in buoni premio
- Monitoraggio statistiche ambientali

## Flusso Utente
1. Accesso al sito
2. Login/registrazione
3. Visualizzazione dashboard
4. Richiesta servizi
5. Accumulo punti
6. Riscatto premi
7. Logout

## Tecnologie
PHP, Laravel, MySQL, HTML/CSS/JavaScript
