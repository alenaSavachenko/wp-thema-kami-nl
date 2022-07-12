

<?php

/*
$args = array( 'posts_per_page' => 1,	'category_name'    => "front-page" );
$lastpost = get_posts( $args );
foreach( $lastpost as $post ) : ?>
    <?php	setup_postdata($post); ?>
    <h4><?php the_title(); ?>  </h4>
    <p> <?php the_content(); ?></p>
    <h4 class="date"> <?php the_date("d.m.Y"); ?> </h4>
    <?php  wp_reset_postdata(); ?>
<?php endforeach; ?>

вывод постов выбранной категории*/ ?>

<div class="page-content">


<div class="parent-fp parent-block1-fp">
    <div class="block-fp block-fp-1">  </div>
    <div class="block-fp block-fp-2">  </div>
</div>

<div class="parent-fp parent-block2-fp">
    <div class="block-fp block-fp-3">  </div>
    <div class="block-fp block-fp-4">  </div>
</div>

</div>

