<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/home':
        $pagina = 'home.php';
        break;
    case '/':
        $pagina = 'home.php';
        break;
    case '/about':
        $pagina = 'about.php';
        break;
    default:
        $pagina = '404.php';
        break;
}

include $pagina;
?> 