<?php get_header(); ?>
<div id="container" class="clearfix">
<div id="main" role="main">


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

        </article>
        </div>

    <?php endwhile; ?>

</div>

<?php //get_sidebar();?>
</div><!-- end #container -->
<?php get_footer(); ?>
