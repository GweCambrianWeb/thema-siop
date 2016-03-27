<?php
function theme_enqueue_styles() {

    $parent_style = 'thema';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'thema-siop',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function thema_siop_fonts(){
  wp_enqueue_style( 'thema-siop-google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display|Open+Sans', false );
}

add_action('wp_enqueue_scripts', 'thema_siop_fonts');

/* WooCommerce */

/**
 * Llwytho ffeil woocommerce.php
 */
 require get_template_directory().'/inc/woocommerce.php';

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'thema_cychwyn_tud_wc', 10);
add_action('woocommerce_after_main_content', 'thema_diwedd_tud_wc', 10);

function thema_cychwyn_tud_wc() {
  echo '<div id="primary" class="content-area">';
}

function thema_diwedd_tud_wc() {
  echo '</div>';
}

?>
