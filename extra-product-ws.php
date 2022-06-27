<?php

/*
 * Plugin Name:       Extra Product Add-Ons WS
 * Plugin URI:        http://websalia.com/
 * Description:       Separador de botón 'add_to_cart' a través de Shortcode.
 * Version:           1.0.0
 * Author:            Websalia
 * Author URI:        http://www.websalia.com/
 * License:           GPL-2.0+
*/

// Aumentamos seguridad. Si alguien intenta acceder al plugin hacemos un exit.
// Estandar de los plugins.
if ( ! defined( 'ABSPATH' ) ) exit;

// Primero registramos el JS customizado donde vamos a introducir todo nuestro Javascript.
function ws_shortcode_resource() {
    wp_register_script("ws-core-js", plugins_url("core.js", __FILE__), array('jquery'), "1.0", false); // Registramos nuestro .js con nombre ws-core-js.
}
// Lo añadimos al init para que lo cargue siempre al refrescar.
add_action( 'init', 'ws_shortcode_resource' );

// Creamos el shortcode con nombre shortcode_ws_extra y hacemos que se ejecute la misma funciona.
add_shortcode( 'shortcode_ws_extra', 'shortcode_ws_extra' );

// Creamos la funcion shortcode_ws_extra
function shortcode_ws_extra() {

    // Primero hacemos un echo mostrando la clase donde vamos a mostrar la copia del calculo del importe.
    // IMPORTANTE: Siempre antes del enqueue.
    echo '<div class="result-ws-extra"></div>';

    // Cargamos el js en el mismo shortocde.
    wp_enqueue_script('jquery');
    wp_enqueue_script("ws-core-js",array('jquery') , '1.0', true);

    // Retornamos el nuevo boton de submit para el formulario .cart.
    return '<button id="add_cart_ws" class="button_ws">Añadir al carrito</button> ';
}
