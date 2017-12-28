<?php

/*
	STYLES & JS
------------------------------------*/
// Load  and add lady-bug styles
function lady_bug_assets()
{
    global $wp_styles;
    wp_register_style('lady-bug', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('lady-bug');
    wp_register_style('lady-bug-legacy', get_template_directory_uri() . '/legacy-style.css', array(), '1.0', 'all');
    wp_enqueue_style( 'lady-bug-legacy');
    $wp_styles->add_data( 'lady-bug-legacy', 'conditional', 'lt IE 9' );
    wp_register_script('script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ));
    wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'lady_bug_assets');

// Font Awesome
function wpb_load_fa() {
  wp_enqueue_style( 'wpb-fa', get_stylesheet_directory_uri() . '/assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css' );
}
add_action('wp_enqueue_scripts', 'wpb_load_fa');

/*
            ACTIVATE SIDEBAR
------------------------------------*/
function lady_bug_register_sidebars() {
    register_sidebar(array(
            'id' => 'sidebar',
            'name' => 'Sidebar',
            'description' => 'Main sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'empty_title'=> ''
    ));
    register_sidebar( array(
		'id' => 'showcase',
                'name' => 'Showcase',
		'description' => 'Showcase sidebar',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2>',
                'after_title' => '</h2>',
                'empty_title'=> ''
    ));
    register_sidebar( array(
		'id' => 'navigation',
                'name' => 'Navigation',
		'description' => 'Navigation sidebar',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h2>',
                'after_title' => '</h2>',
    ));
}
// Adding sidebars to Wordpress
add_action( 'widgets_init', 'lady_bug_register_sidebars' );

/*
	CUSTOM SETTINGS
 * Adds the individual sections, settings, and controls to the theme customizer
--------------------------------------------------------------------------------*/
function lady_bug_customizer( $wp_customize ) {
    /* Sections' order
     **************************************/
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    $wp_customize->get_section('title_tagline')->priority = 1;
    $wp_customize->get_section('static_front_page')->priority = 2;

    /* Title & Tagline become Branding
     **************************************/
    $wp_customize->get_section('title_tagline')->title = __('Branding','lady-bug');
    $wp_customize->get_control('blogdescription')->label = __('Author','lady-bug');
    //about text area
    $wp_customize->add_setting(
        'about_textarea',
        array(
            'default' => 'Default about text',
            'sanitize_callback' => 'esc_textarea'
        )
    );
    $wp_customize->add_control(
        'about_textarea',
        array(
            'label' => __('About','lady-bug'),
            'section' => 'title_tagline',
            'type' => 'textarea'
        )
    );
    //linkedin url
    $wp_customize->add_setting(
        'linkedin_text',
         array(
             'sanitize_callback' => 'esc_url'
         )
    );
    $wp_customize->add_control(
        'linkedin_text',
        array(
            'label' => __('LinkedIn URL','lady-bug'),
            'section' => 'title_tagline',
            'type' => 'text'
        )
    );
   //github url
    $wp_customize->add_setting(
        'github_text',
         array(
             'sanitize_callback' => 'esc_url'
         )
    );
    $wp_customize->add_control(
        'github_text',
        array(
            'label' => __('GitHub URL','lady-bug'),
            'section' => 'title_tagline',
            'type' => 'text'
        )
    );

    /* Google Analytics
     **************************************/
    $wp_customize->add_section(
        'google_analytics_section',
        array(
            'title' => __('Google Analytics','lady-bug'),
            'description' => 'Enter your analytics tracking code.',
            'priority' => 3
        )
    );
    $wp_customize->add_setting(
        'ga_textarea',
         array(
             'sanitize_callback' => 'esc_textarea'
         )
    );
    $wp_customize->add_control(
        'ga_textarea',
        array(
            'section' => 'google_analytics_section',
            'type' => 'textarea'
      )
    );
}
add_action( 'customize_register', 'lady_bug_customizer' );

/*
	POST FORMATS
------------------------------------*/
function add_post_formats() {
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote', 'video' ) );
}

add_action( 'after_setup_theme', 'add_post_formats', 20 );
/*
	TITLE
------------------------------------*/
function custom_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'custom_wp_title', 10, 2 );
/*
	CONTENT WIDTH
------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
/*
	THEME SUPPORT
------------------------------------*/
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

?>
