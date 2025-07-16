<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione 1</title>
</head>

<body>
    <form action="elabora.php" method="post">
        <input type="text" name="nome" placeholder="Inserisci il tuo nome">
        <input type="date" name="dataNascita" placeholder="Inserisci la tua data di nascita">
        <div style="position: relative; display: inline-block;">
            <span style="position: absolute; left: 8px; top: 50%; transform: translateY(-50%); color: #888;">€</span>
            <input type="number" name="importo" step="0.01" min="0" placeholder="0.00" required
                style="padding-left: 25px; height: 30px; font-size: 16px;">
        </div>
        <input type="text" name="parola" placeholder="Inserisci una parola da cercare">
        <input type="submit" value="Invia">
    </form>
</body>