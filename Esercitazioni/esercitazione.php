<?php
$a = "  Matteo 1 2 3  ";
echo strlen($a) . "\n";
echo strtoupper($a) . "\n";
echo strtolower($a) . "\n";
echo trim($a) . "\n";

$b = "Php e divertente e potente";
$c = "divertente";

echo str_replace($c, "semplice", $b) . "\n";

$d = "ciao ragazzi oggi si programma in php!";

$dExploded = explode(" ", $d);
foreach ($dExploded as $parola2) {
    echo $parola2 . "\n";
}

$f = ["Mario", "Luigi", "Giovanni", "Francesco", "Giuseppe"];

echo sort($f) . "\n";

$studenti = [
    ["nome" => "Mario", "voto" => 8],
    ["nome" => "Luigi", "voto" => 7],
    ["nome" => "Giovanni", "voto" => 6],
    ["nome" => "Francesco", "voto" => 5],
    ["nome" => "Giuseppe", "voto" => 4],
];

foreach ($studenti as $studente) {
    if ($studente["voto"] > 6) {
        echo $studente["nome"] . " ha preso: " . $studente["voto"] . "\n";
    }
}
;

$stringa = "html,css,php,js";

$stringaExploded = explode(",", $stringa);

print_r($stringaExploded);


array_push($stringaExploded, "sql");

$stringaImploded = implode(",", $stringaExploded);

echo $stringaImploded . "\n";

$parole = ["Ragazza", "Draghi", "Gatto", "Cane", "Pinguino","Rh?inoceronte"];
$counter = 0;
foreach ($parole as $parola) {
    if (strlen($parola) > 5) {
        $counter++;
    }
}
echo $counter . "\n";

$numeri = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
print_r ($numeri);
$v = array_merge(array_map("strval", $numeri), $f);

print_r($v);


$frutti = ["Mela", "Pera", "Banana", "Arancia", "Kiwi", "Pesca", "Pistacchio", "Mandorla", "Nocciola", "Mandarino"];
 echo "e presente il frutto pesca? ==> " . in_array("Pesca", $frutti) . "\n";

$stringa2 = "Supercalifragilidichespiralitoso";
$stringa2Splitted = str_split($stringa2);

foreach ($stringa2Splitted as $lettera) {
    if ($lettera == "a" || $lettera == "e" || $lettera == "i" || $lettera == "o" || $lettera == "u") {
        echo $lettera;
}
}




?>