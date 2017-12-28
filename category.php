<?php get_header(); ?>
<div id="container" class="clearfix">
<div id="main" role="main" class="clearfix">
    <h1><?php single_cat_title(); ?></h1>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="feature" id="post-<?php the_ID(); ?>">
            <div class="clearfix">
                <?php if( has_post_thumbnail() ) : ?>
                    <div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
                <?php endif; ?>
                    
                <div class="container">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <?php if(!empty( $post->post_excerpt )){?>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
    
<?php else :
    get_template_part( 'no-results', 'index' ); 
endif; ?>

</div>
        
<?php //get_sidebar();?>
</div><!-- end #container -->
<?php get_footer(); ?>