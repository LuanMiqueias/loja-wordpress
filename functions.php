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
    add_image_size('banner', 1200, 300, ['center']);
    add_image_size('img_category', 900, 900, ['center']);
    update_option('medium_crop', 1);
}
add_action('after_setup_theme', 'banner_images_custom');

function format_product($new_products, $img_size){
    $produto_final = [];
    foreach($new_products as $product){
        $produto_final[] = [
        'name' => $product->get_name(),
        'price' => $product->get_price_html(),
        'img' => wp_get_attachment_image_src($product->get_image_id(), [300, 300])[0],
        'link' => $product->get_permalink(),
        ];
    };
    return $produto_final;
}
?>
<?php function lm_lista_de_produtos($product){ ?>
<ul class="lista-produtos">
     <?php foreach($product as $products){?>
        <li class="produto">
          <a class="teste" href="<?= $products['link']?>">
             <img src="<?= $products['img']?>" alt="<?= $products['name'] ?>">
             <!-- <div class="verMais"><span>Ver Mais</span></div> -->
             <div class="titulo-produto">
             <span><?= $products['price'] ?></span>
             <h2><?= $products['name'] ?></h2>
             </div>
          </a>
        </li>
     <?php }?>
 </ul>

<?php $product = []; } ?>

