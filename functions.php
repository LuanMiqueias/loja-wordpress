<?php 

function theme_support_woocommerce(){
    add_theme_support('woocommerce');
}

add_action("after_setup_theme", "theme_support_woocommerce");

function handle_css(){

    wp_register_style("handle-style", get_template_directory_uri() . "./style.css", [], "1.0.0", false);
    wp_enqueue_style("handle-style");
}

add_action('wp_enqueue_scripts', 'handle_css');

function lm02_loop_shop_per_page(){
    return 12;
}

add_filter('loop_shop_per_page', 'lm02_loop_shop_per_page');

function banner_images_custom(){
    add_image_size('banner', 1300, 300, ['center']);
    update_option('medium_crop', 1);
}
add_action('after_setup_theme', 'banner_images_custom');

?>