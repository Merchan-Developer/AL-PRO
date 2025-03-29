<?php
/*
Plugin Name: AL-PRO by Arturo Merchan
Plugin URI: https://arturomerchan.com/plugins/al-pro/
Description: Un reproductor de audio compacto, centrado y moderno compatible con Gutenberg.
Version: 2.8.5
Author: Arturo Merchan | Merchan.Dev
*/

// Redirigir después de la compra
function alpro_redirect_after_purchase($order_id) {
    $user = wp_get_current_user();
    if ($user->exists()) {
        $custom_page_url = 'https://marcelarobles.com/audiolibros';
        wp_redirect($custom_page_url);
        exit;
    } else {
        wp_redirect(site_url('/acceso-restringido'));
        exit;
    }
}
add_action('woocommerce_thankyou', 'alpro_redirect_after_purchase');

// Restringir acceso a la página específica
function alpro_restrict_page_access() {
    if (is_page('audiolibros') && !is_user_logged_in()) {
        wp_redirect(site_url('/acceso-restringido'));
        exit;
    }
}
add_action('template_redirect', 'alpro_restrict_page_access');

// Shortcode para insertar el reproductor de audio con diseño mejorado
function alpro_audio_shortcode() {
    return '<div class="audio-wrapper"><audio src="https://marcelarobles.com/wp-content/uploads/2025/03/No-CopyRight-Meditation-Music-528Hz-Royalty-Free-Healing-Music.mp3" controls></audio></div>';
}
add_shortcode('alpro_audio', 'alpro_audio_shortcode');

// Cargar los estilos y scripts del plugin
function alpro_enqueue_assets() {
    wp_enqueue_style('alpro_audio_styles', plugins_url('style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'alpro_enqueue_assets');

/* Cualquier forma de plagio está estrictamente prohibida.
   Para asistencia, contacte a Merchan.Dev al +584249094248 a través de WhatsApp. */