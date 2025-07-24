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

## 2. PROGETTARE LA STRUTTURA DEI DATI

### DIAGRAMMA E/R

Il nostro database si forma sulla base di 3 entità: Utenti, Servizi e Azienda di smaltimento.


## 2.1 Entità e le loro variabili:


### Utenti

L’entità Utenti rappresenta i soggetti che utilizzano il sistema e monitora la loro partecipazione alla raccolta differenziata. Oltre alle informazioni anagrafiche, tiene traccia della quantità giornaliera di rifiuti prodotti, dei punti accumulati per il corretto smaltimento e dei buoni disponibili in base ai punti raccolti.
Entità: Utenti
 CodiceFiscale (PK, varchar)
 Nome (varchar)
 Cognome (varchar)
 Numero (varchar)
 Città (varchar)
 Via (varchar)
 Cap (int)
 Data_iscrizione (date)


### Servizi

L’entità Servizi descrive le attività di raccolta offerte, associando ciascun servizio a un centro di raccolta specifico, con indicazione di data, orario e identificativo del ritiro. Include anche statistiche sui tipi di rifiuto trattati, con relativo colore identificativo, e permette di distinguere le varie tipologie di servizio richiesto dall’utente.
Entità: Servizi
 Id_servizio (PK, int)
 Centro_raccolta (varchar)
 Informativa_utenti (varchar)
 Orario_ritiro_rifiuti (time)
 Statistiche_rifiuto (varchar)
 Smaltimento_rifiuto (varchar)
 Data_id (FK, int)


### Relazione: Richiede

Associazione molti a molti tra Utenti e Servizi.
CodiceFiscale (FK, varchar)
 Id_servizio (FK, int)
 Chiave primaria composta: CodiceFiscale, Id_servizio


### Smaltimento

L’entità Smaltimento rappresenta il conferimento finale dei rifiuti, indicando la zona di raccolta, la data e l’identificativo dello smaltimento, nonché la tipologia specifica di rifiuto coinvolto.
Entità: Smaltimento
 Data_id (PK, int)
 Volume_rifiuti (varchar)
 Tipologia_rifiuti (varchar)
 Zona_di_raccolta (varchar)


## 2.2 Business rules

Un utente può richiedere più servizi, e ogni servizio può essere richiesto da più utenti (relazione molti a molti).
Ogni servizio è associato a un solo smaltimento, ma uno smaltimento può essere associato a più servizi (relazione molti a uno).


## 3. Flussi utente

Il diagramma UML raffigura la comunicazione tra client e server, in particolare nelle fasi di accesso, richiesta di servizi, e gestione degli utenti. Di seguito viene spiegato il funzionamento passo per passo.


FASE DESCRIZIONE COMUNICAZIONE
1. Richiesta iniziale (Browser)
Il client invia una richiesta HTTP per accedere al sito.
client (dispatch) → server
2. Risposta dal server
Il server recupera il file HTML/CSS richiesto e lo invia al browser, che lo interpreta e visualizza la pagina.
server (risposta) → client
3. Registrazione/Login
Se l’utente non è registrato, invia una richiesta di registrazione. I dati vengono salvati nella gestione utenti.
utente (richiesta servizio) → gestione utenti
4. Conferma registrazione
Una volta salvati i dati, la gestione utenti conferma la registrazione.
gestione utenti 
(conferma) → client
5. Richiesta servizio
L’utente loggato invia una richiesta per accedere a un servizio disponibile.
utente → :Servizi
6. Verifica sessione
I servizi inviano una richiesta a gestione utenti per verificare la sessione o identità dell’utente.
Servizi → Gestione Utenti
7. Sessione confermata
Se la sessione è valida, la gestione utenti conferma e la richiesta prosegue.
Gestione Utenti → Servizi
8. Invio ai servizi
La richiesta passa alla gestione dei servizi che la elabora.
Servizi richiesta → Gestione Servizi
9. Comunicazione al server
GestioneServizi aggiorna i dati e invia la richiesta al server per registrarla.
Gestione Servizi → Server
10. Risposta finale
Il server registra e conferma i dati, e la risposta finale torna indietro fino al client.
Server → Gestione Servizi → Servizi → client
11. Logout
L’utente può decidere di effettuare il logout, chiudendo la sessione.
client logout → gestione utenti


## 4. Flowchart
Algoritmo di Autenticazione e Accesso

L’algoritmo gestisce il login, la generazione del token, il caricamento dei servizi utente e la visualizzazione del form di profilo.

