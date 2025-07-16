<?php 
$messaggio = "Ciao\n";
$a = 4;
$b = 5;
echo $messaggio . "\n" . ($a + $b) . "\n";
$eta = 20;

if ($eta >= 18) {
    echo "Sei maggiorenne\n";
} else {
    echo "Sei minorenne\n";
};

for ($i = 1; $i < 11; $i++) {
    echo $i."\n";
};

for ($i = 1; $i < 6; $i++) {
    for ($j = 1; $j < 6; $j++) {
        echo $i."x".$j."=".$i*$j."\n";
    };
};

$f = ["banana", "mela", "pera", "kiwi"];

foreach ($f as $frutta) {
    echo $frutta . "\n";
};

foreach ($f as $frutta) {
    if (strlen($frutta) > 4) {
        echo $frutta."\n";
};};

function incrementa($x)
{ $x++;
    return $x;

}
$x = 10;
echo "valore \$x:$x.\n";
echo "valore \$x dopo la funzione:".incrementa($x)."\n";



$numero = 10;

for ($i = 1; $i < 11; $i++) {
    echo $i ; if ($i%2 == 0) {echo "pari\n";} else {echo "dispari\n";};
}

function prezzoConIva($prezzo, $iva) {
    return $prezzo * (1 + $iva/100);

}

$prezzo = 100;
$iva = 22;
echo "prezzo con iva di $iva%:".prezzoConIva($prezzo, $iva)."\n";

$studenti = [
    ["nome" => "Mario", "eta" => 20],
    ["nome" => "Luigi", "eta" => 12],
    ["nome" => "Giovanni", "eta" => 11],
    ["nome" => "Francesco", "eta" => 23],
    ["nome" => "Marco", "eta" => 24],
    ["nome" => "Luca", "eta" => 25],
    ["nome" => "Davide", "eta" => 26],
    ["nome" => "Andrea", "eta" => 27],
    ["nome" => "Simone", "eta" => 28],
];

foreach ($studenti as $studente) {
    if ($studente["eta"] >18){echo $studente["nome"]." è maggiorenne\n";} 
    else {echo $studente["nome"]." è minorenne\n";};
};

$a = 1;
$b = 2;
$c = 3;

$d = $a + $b + $c;
echo $d."\n";
?>