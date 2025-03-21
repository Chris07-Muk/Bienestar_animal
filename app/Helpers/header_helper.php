<?php
use CodeIgniter\HTTP\URI;

function header_navbar($nav_items = array()) {
    $current_path = service('request')->uri->getPath(); // Obtiene solo la ruta sin el dominio

    $html = '
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
        <nav class="navigation navbar navbar-expand-md navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">';

    foreach ($nav_items as $item) {
        // Verificar que $item["href"] no sea null o vacío y luego pasar a parse_url y trim()
        $href = $item["href"] ?? '';  // Si href es null, asigna una cadena vacía
        $url_path = parse_url(base_url($href), PHP_URL_PATH); // Obtiene la ruta de la URL

        // Asegurarse de que la URL no sea null antes de pasar a trim()
        $href_path = $url_path ? trim($url_path, '/') : ''; // Usar una cadena vacía si $url_path es null

        // Verificar si la URL actual coincide con la ruta del enlace
        $is_active = ($current_path === $href_path) ? 'active' : '';

        $html .= '<li class="nav-item ' . $is_active . '">
                    <a class="nav-link" href="' . base_url($href) . '">
                        ' . (isset($item["icon"]) ? '<i class="nav-icon ' . $item["icon"] . '"></i> ' : '') . $item["tarea"] . '
                    </a>
                </li>';
    }

    $html .= '
                </ul>
            </div>
        </nav>
    </div>';

    return $html;
}
?>
