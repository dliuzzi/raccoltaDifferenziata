<?php

$nome = htmlspecialchars($_POST['nome']);
$dataNascita = htmlspecialchars($_POST['dataNascita']);
echo "Ciao $nome\n";
echo "La tua data di nascita e' $dataNascita\n";
echo "L'importo e' " . conversioneEuroDollaro($_POST['importo']) . " \$\n";

function conversioneEuroDollaro(float $importo) {
    $importo = $importo * 1.10;
    return $importo;
}

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$nome_file = $_SERVER['SCRIPT_NAME'];
echo "L'ip e' $ip,\n il browser e' $user_agent,\n il nome del file e' $nome_file\n";

$parola = htmlspecialchars($_POST['parola']);
echo "La parola cercata e' $parola\n";
?>