<?php
/*
Plugin Name: AL-PRO Enhanced
Description: Un reproductor de audio centrado y moderno, que solo afecta a una página específica.
Version: 2.9
Author: Arturo Merchan | Merchan.Dev
*/

// Shortcode para el reproductor de audio
function alpro_audio_shortcode() {
    if (!is_page('audiolibros')) {
        return '<p style="color: red; font-weight: bold;">Este reproductor solo está disponible en la página autorizada.</p>';
    }
    return '<div class="audio-wrapper"><audio src="https://marcelarobles.com/wp-content/uploads/2025/03/No-CopyRight-Meditation-Music-528Hz-Royalty-Free-Healing-Music.mp3" controls></audio></div>';
}
add_shortcode('alpro_audio', 'alpro_audio_shortcode');

// Cargar estilos solo en la página específica
function alpro_enqueue_styles() {
    if (is_page('audiolibros')) { // Verificar si estamos en la página específica
        wp_enqueue_style('alpro_audio_styles', plugins_url('style.css', __FILE__));
    }
}
add_action('wp_enqueue_scripts', 'alpro_enqueue_styles');

/* Cualquier forma de plagio está estrictamente prohibida.
   Para asistencia, contacte a Merchan.Dev al +584249094248 a través de WhatsApp. */
