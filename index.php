<?php get_header(); ?>
<div id="container" class="clearfix">
<div id="main" role="main">

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <article>
         <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php if( has_post_thumbnail() ) : ?>
                    <div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
                <?php endif; ?>
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
    
<?php else :
    get_template_part( 'no-results', 'index' ); 
endif; ?>

</div>
        
<?php //get_sidebar(); ?>
</div><!-- end #container -->
<?php get_footer(); ?>