<?php
// Función para configurar el menú dinámicamente
function configurar_menu_panel() {
    $menu = [];

    // Opción Dashboard
    $menu['dashboard'] = [
        'is_active' => false,
        'href' => route_to("dashboard"),
        'text' => 'Dashboard',
        'icon' => 'fa fa-area-chart',
        'submenu' => [],
        'id' => 'dashboard_menu'
    ];

    $menu['usuarios'] = [
        'is_active' => false,
        'href' => '#',
        'text' => 'Usuarios',
        'icon' => 'fa fa-battery-full',
        'submenu' => [
            [
                'is_active' => false,
                'href' => route_to('administracion_usuarios'),
                'text' => 'Usuarios aceptados',
                'icon' => 'fa fa-battery-three-quarters'
            ],
            [
                'is_active' => false,
                'href' => route_to('usuarios_pendientes'),
                'text' => 'Usuarios pendientes',
                'icon' => 'fa fa-battery-half'
            ]
        ],
        'id' => 'opcionb_menu'
    ];

    // Opción con submenús
    $menu['reportes'] = [
        'is_active' => false,
        'href' => '#',
        'text' => 'Reportes',
        'icon' => 'fa fa-battery-full',
        'submenu' => [
            
            [
                'is_active' => false,
                'href' => route_to('reportes_aceptados'),
                'text' => 'Reportes aceptados',
                'icon' => 'fa fa-battery-three-quarters'
            ],
            [
                'is_active' => false,
                'href' => route_to('reportes_pendientes'),
                'text' => 'Reportes pendientes',
                'icon' => 'fa fa-battery-half'
            ]
        ],
        'id' => 'opcionb_menu'
    ];

	$menu['Adopciones'] = [
        'is_active' => false,
        'href' => route_to("adopciones"),
        'text' => 'Adopciones',
        'icon' => 'fa fa-area-chart',
        'submenu' => [],
        'id' => 'dashboard_menu'
    ];

    $menu['Refugios'] = [
        'is_active' => false,
        'href' => route_to("refugios"),
        'text' => 'Refugios',
        'icon' => 'fa fa-area-chart',
        'submenu' => [],
        'id' => 'dashboard_menu'
    ];


    

    return $menu;
}

// Función para crear el menú dinámico
function crear_menu_panel() {
    $menu = configurar_menu_panel();
    $html = '<ul class="nav nav-secondary">';

    // Generar dinámicamente las opciones del menú
    foreach ($menu as $key => $item) {
        $hasSubmenu = !empty($item['submenu']);
        $collapseID = 'submenu_' . $key; // ID único para evitar conflictos

        $html .= '<li class="nav-item">';
        $html .= '<a ' . ($hasSubmenu ? 'data-bs-toggle="collapse" href="#' . $collapseID . '"' : 'href="' . $item['href'] . '"') . '>';
        $html .= '<i class="' . $item['icon'] . '"></i>';
        $html .= '<p>' . $item['text'] . '</p>';
        if ($hasSubmenu) {
            $html .= '<span class="caret"></span>';
        }
        $html .= '</a>';

        // Generar submenú si existe
        if ($hasSubmenu) {
            $html .= '<div class="collapse" id="' . $collapseID . '">';
            $html .= '<ul class="nav nav-collapse">';
            foreach ($item['submenu'] as $subitem) {
                $html .= '<li>';
                $html .= '<a href="' . $subitem['href'] . '">';
                $html .= '<i class="' . $subitem['icon'] . '"></i>';
                $html .= '<span class="sub-item">' . $subitem['text'] . '</span>';
                $html .= '</a>';
                $html .= '</li>';
            }
            $html .= '</ul>';
            $html .= '</div>';
        }

        $html .= '</li>';
    }

    $html .= '</ul>';
    return $html;
}
?>






