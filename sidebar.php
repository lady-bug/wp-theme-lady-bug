<div id="sidebar">
<aside>
        <?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
                <aside id="search" class="widget widget_search">
                        <?php get_search_form(); ?>
                </aside>
                <aside id="archives" class="widget widget_archive">
                        <h3 class="widget-title"><?php _e( 'Archives', 'lady-bug' ); ?></h3>
                        <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                        </ul>
                </aside>
                <aside id="meta" class="widget widget_meta">
                        <h3 class="widget-title"><?php _e( 'Meta', 'lady-bug' ); ?></h3>
                        <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                        </ul>
                </aside>
	<?php endif; ?>
</aside>
</div>