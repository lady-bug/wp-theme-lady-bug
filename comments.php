<?php
// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}
?>
<?php if ( have_comments() ) : ?>

  <h2><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h2>

  <ul class="commentlist">
	<?php wp_list_comments(); ?>
  </ul>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>

  <?php if ( ! comments_open() ) : ?>
      <p class="no-comments"><?php _e( 'Comments are closed.' , 'lady-bug' ); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>