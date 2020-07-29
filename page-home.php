<?php 
//template name: Home
$img_url = get_stylesheet_directory_uri() . "/img";

get_header($name);

?>

<!-- <div class="banner container">
    <img src="<?= $img_url ?>/banner.jpg" alt="" width="1300"/>
</div> -->
<pre>
<?php
print_r(get_categories());
?>
</pre>
<?php get_footer($name); ?>