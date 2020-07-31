<?php 
//template name: Home
$img_url = get_stylesheet_directory_uri() . "/img";
$data = [];
get_header($name);

$new_products = wc_get_products([
    'limit'=> 4,
    'orderBy'=> 'date',
    'order'=> 'DESC',
]);

$products_sales = wc_get_products([
    'limit'=> 4,
    'meta_key'=> 'total_sales',
    'orderby'=> 'meta_value_num',
    'order'=> 'DESC',
]);

$id_home = get_the_ID();

$categoria_1 = get_post_meta($id_home, 'categoria_1', true);
$categoria_2 = get_post_meta($id_home, 'categoria_2', true);
$categoria_3 = get_post_meta($id_home, 'categoria_3', true);
$categoria_4 = get_post_meta($id_home, 'categoria_4', true);

function get_product_category_data($category){

   $cat = get_term_by('slug', $category, 'product_cat');
   $cat_id = $cat->term_id;
   $img_cat = get_term_meta($cat_id, 'thumbnail_id', true);

   return [
       'name' => $cat -> name,
       'id' => $cat_id,
       'link' => get_term_link($cat_id, 'product_cat'),
       'img' => wp_get_attachment_image_src($img_cat, 'img_category')[0],
   ];
};

$data['maisVendidos'] = format_product($products_sales, 'medium');
$data['lancamentos'] = format_product($new_products, [300, 300]);

$data['categoria_product'] ['categoria_1'] =  get_product_category_data($categoria_1);
$data['categoria_product'] ['categoria_2'] =  get_product_category_data($categoria_2);
$data['categoria_product'] ['categoria_3'] =  get_product_category_data($categoria_3);
$data['categoria_product'] ['categoria_4'] =  get_product_category_data($categoria_4);

?>
<div class="container container_slide">
<div class="content banner">

    <?php echo do_shortcode('[metaslider id="107"]');?>
    <?php echo do_shortcode('[metaslider id="85"]');?>

</div>    
</div>
<div class="vantagens container">
<ul class="content">
<li>Frete Gratis</li>
<li>Troca Agilizada</li>
<li>Até 12x</li>
</ul>
</div>

<!-- <div class="conheca"><a href="#lancamentos"></a></div> -->
<section id="lancamentos" class="lancamentos container">

<div class="content">
<div class="subtitulo">
    <h1>NOVIDADES <span>ESCOLHIDAS</span> PARA <span>VOCE!</span></h1>
</div>
<?= lm_lista_de_produtos($data['lancamentos'])?>
</div>

</section>


<section class="categorias_home container">
    <div class="content_categorias">

    <?php foreach($data['categoria_product'] as $category) { ?>
         <div style="background:url(<?= $category['img'] ?>) no-repeat center center"><a href="<?= $category['link'] ?>"><?= $category['name']; ?></a></div>
    <?php } ?>
    </div>
</section>
<section id="mais-vendidos" class="mais-vendidos container">

<div class="content">
<div class="subtitulo">
    <h1>Produtos mais <span>vendidos</span> dessa <span>semana!</span></h1>
</div>
<?= lm_lista_de_produtos($data['maisVendidos'])?>
</div>

</section>

<?php get_footer($name); ?>