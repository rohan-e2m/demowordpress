<?php get_header(); ?>

<div class="single-toy-post">
    <?php
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="toy-content"><?php the_content(); ?></div>
            <div class="toy-categories">
                <?php the_terms( get_the_ID(), 'toys_categories' ); ?>
            </div>
        <?php endwhile;
    else :
        echo 'No Toys found.';
    endif;
    ?>
</div>

<?php get_footer(); ?>
