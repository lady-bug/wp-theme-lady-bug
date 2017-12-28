<?php get_header(); ?>
<div id="container" class="clearfix">
<div id="main" role="main">

    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
         <h1><?php the_title(); ?></h1>
            <div class="content">
                <div class="clearfix<?php if( has_post_thumbnail() ){ echo ' thumbnailed';} ?>">
                  <?php if(!empty( $post->post_excerpt )){?>
                      <div class="excerpt">
                        <?php
                          if(get_field('description'))
                          {
                          	echo '<div>' . get_field('description') . '</div>';
                          }
                          if(get_field('role'))
                          {
                          	echo '<p><strong>' . get_field('role') . '</strong></p>';
                          }
                          if(get_field('related_url'))
                          {
                          	echo '<p><a href="' . get_field('related_url') . '" target="_blank">' . get_field('related_url') . '</a></p>';
                          }
                        ?>
                      </div>
                  <?php } ?>
                  <?php if( has_post_thumbnail() ) : ?>
                      <div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
                  <?php endif; ?>
                </div>

                <?php the_content('Continue...'); ?>

                <?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
            </div>
         <div class="meta">
                <div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
                <div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
        </div><!-- Meta -->
        </article>
        </div>
    <?php endwhile; ?>
    <!-- pagintation -->
    <div id="pagination" class="clearfix">
            <div class="past-page"><?php previous_post_link( '%link', '<span class="button">&lsaquo;</span> <span class="item">Previous</span><span class="title">%title</span>', true); ?></div>
            <div class="next-page"><?php next_post_link( '%link', '<span class="item">Next</span> <span class="button">&rsaquo;</span><span class="title">%title</span>', true); ?></div>
    </div><!-- pagination -->

    <?php
        // If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
        if ( comments_open() || '0' != get_comments_number() )
                comments_template( '', true );
    ?>
<?php else :
    get_template_part( 'no-results', 'index' );
endif; ?>

</div>

<?php //get_sidebar();?>
</div><!-- end #container -->
<?php get_footer(); ?>
