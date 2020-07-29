

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php bloginfo()?> <?php wp_title('|')?>  </title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php 

$img_url = get_stylesheet_directory_uri() . "/img";
$lm03_cart_count = WC()->cart->get_cart_contents_count();

?>
<header class="header container">
<div class="header-content content">
    
<a href="/wordpress/" class="logo"> <img src="<?= $img_url ?>/logo.svg" alt="Eletro Shop" width="180"></a>

<form class="pesquisar" action="<?php bloginfo("url"); ?>/loja/" method="get">

<input type="text" name="s" id="s" placeholder="pesquisar" value="<?php the_search_query();?>"/>
<span></span>
<input type="text" name="post_type" value="product" class="hidden">
<input type="submit" value="Buscar" id="searchButtom">
</form>
<nav class="nav">
<a href="/wordpress/minha-conta" class="minha-conta">Minha conta</a>
<a href="/wordpress/carrinho" class="carrinho">
<?php if($lm03_cart_count) { ?>

 <span class="carrinho-count"> <?= $lm03_cart_count ?> </span>

<?php } ?>
</a>
</nav>
</div>
</header>
<?php
wp_nav_menu([
    'menu' => 'categorias',
    'container' => 'nav',
    'container_class' => 'nav-categorias'
])
?>
