
<div class="page-content">


    <div class="grid-container-face" >
        <?php
        $args = array( 'posts_per_page' => 8,   'category_name'    => "face-painting" );
        $lastpost = get_posts( $args );
        $iterator=1;
        foreach( $lastpost as $post ) : ?>
            <?php  setup_postdata($post); ?>
            <div class="post-face post-face-<?=$iterator?>">
                <div class="ch-face ch-face-<?=$iterator?>">

                    <?php if ($iterator==2 or $iterator==3) : ?>
                        <p><?php the_content(); ?>  </p>
                    <?php endif; ?>

                    <style>
                        .ch-face-<?=$iterator?>  {
                            background: url(<?=get_the_post_thumbnail_url()?>) no-repeat center;
                            background-size: cover;
                        }
                    </style>


                </div>
            </div>


            <?php $iterator++; ?>
            <?php  wp_reset_postdata(); ?>
        <?php endforeach; ?>
    </div>

</div>

