<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base = '/ProgettoPHP';
if (strpos($uri, $base) === 0) {
    $uri = substr($uri, strlen($base));
    if ($uri === '') $uri = '/';
}

switch ($uri) {
    case '/home':
        $pagina = 'home.php';
        break;
    case '/':
        $pagina = 'home.php';
        break;
    case '/about.php':
        $pagina = 'about.php';
        break;
    default:
        $pagina = '404.php';
        break;
}

include __DIR__ . '/' . $pagina;
?> 