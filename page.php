<?php
get_header();
?>

<?php
if( is_page( "about-me-2" ) ) : ?>
    <?php get_template_part('template-parts/about_me') ;?>
     <?php elseif (is_page("face-painting")) :?>

    <?php get_template_part('template-parts/face-painting') ;?>
     <?php elseif (is_page("g")) :?>
    <?php get_template_part('template-parts/gallery') ;?>

<?php elseif (is_page("products")) :?>
    <?php get_template_part('template-parts/products-for-sale') ;?>

<?php elseif (is_page("blog")) :?>
    <?php get_template_part('template-parts/blog') ;?>


<?php endif; ?>


<?php
get_footer(); ?>
