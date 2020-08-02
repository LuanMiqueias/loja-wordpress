<!-- <div class="email"></div> -->
<footer class="footer container">
<div class="content footer-content">

<!-- <img src="<?php get_stylesheet_directory_uri(); ?>/logo.svg" alt="" height="40px"> -->

<section>
    <div class="paginas">
        <h2>Categorias</h2>
        <?php
        wp_nav_menu([
            'menu' => 'categorias',
            'container' => 'nav',
            'container_class' => 'nav-footer'
        ])
        ?>
    </div>
    <div class="paginas">
        <h2>Mapa do site</h2>
        <?php
        wp_nav_menu([
            'menu' => 'mapa-site',
            'container' => 'nav',
            'container_class' => 'nav-footer'
        ])
        ?>
    </div>
    <div class="paginas">
        <h2>Minha Conta</h2>
        <?php
        wp_nav_menu([
            'menu' => 'minha-conta',
            'container' => 'nav',
            'container_class' => 'nav-footer minha-conta'
        ])
        ?>
    </div>
</section>

<section class="grid-footer-2">
    <div >
        <h2>Siga-nos nas redes sociais</h2>
        <?php
        wp_nav_menu([
            'menu' => 'redes-sociais',
            'container' => 'nav',
            'container_class' => 'nav-footer redes-sociais'
        ])
        ?>
    </div>
    <div>
        <h2>Formas de Pagamento</h2>
        <div class="tipo-pagamento ">
        <p>cartão de credito</p>
        <p>boleto</p>
        <p>PayPal</p>
        </div>
    </div>
</section>

</div>
<?php
$countries = WC()->countries;

$base_address = $countries->get_base_address();
$base_city = $countries->get_base_city();
$base_state = $countries->get_base_state();

$complete_address = "$base_address, $base_city, $base_state";
?>
<div class="copyright"><p>Eletro Shop &copy; <?= date('Y')?> - <?= $complete_address ?></p></div>
</footer>

<?php wp_footer(); ?>

</body>
</html>