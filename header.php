<!DOCTYPE html>
<!--[if lte IE 8]>
<html class="legacy no-js" <?php language_attributes(); ?>>
<![endif]-->
<html class="no-js" <?php language_attributes(); ?>>
<head>
<script>
    (function(){
        var d=document.documentElement; d.className=d.className.replace(/\bno-js\b/,'js');
        if (!("ontouchstart" in document.documentElement)) {
            document.documentElement.className += " no-touch";
        }
    }());
</script>
    <title><?php wp_title(' | ', true, 'right'); ?></title>

    <!-- viewport optimisation -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <!-- apple-mobile-web-app-capable set to yes will run the web application in full screen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- you can then define a different title for the home screen icon -->
    <meta name="apple-mobile-web-app-title" content="<?php wp_title(' > ', true, 'right'); ?>" />
    <!--
    you can also define style of status bar
    - black, the web content is displayed below the status bar
    - black-translucent, the web content is displayed on the entire screen, partially obscured by the status bar
    -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- mobile Internet Explorer allows us to activate ClearType technology for smoothing fonts for easy reading  -->
    <meta http-equiv="cleartype" content="on" />

    <!-- Internet Explorer version: latest one using Google Chrome Frame seamlessly to enhance browsing experience in Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php
    // META DATA TO BE ADDED
    //<meta name="keywords" content="keywords here" />
    //<meta name="description" content="description here" />
    ?>
    <meta name="author" content="<?php bloginfo( 'name' ); ?>" />

    <!-- home screen icon set -->
    <!--iOS -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/apple-touch-icon-precomposed-144.png" rel="apple-touch-icon-precomposed" sizes="144x1414" />
    <!-- iPhone 4 -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/apple-touch-icon-precomposed-114.png" rel="apple-touch-icon-precomposed" sizes="114x114" />
    <!-- iPad -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/apple-touch-icon-precomposed-72.png" rel="apple-touch-icon-precomposed" sizes="72x72" />
    <!-- iPhone, iPod, Android -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/apple-touch-icon-precomposed-57.png" rel="apple-touch-icon-precomposed" />
    <!-- default -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/apple-touch-icon-64.png" rel="apple-touch-icon" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.ico" />
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.png" />

    <!-- startup images: specifies a splash image to use when the page is loading -->
    <link rel="apple-touch-startup-image" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/startup-320x460.png" media="screen and (max-device-width:320px)" />
    <link rel="apple-touch-startup-image" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/startup-640x920.png" media="(max-device-width:480px) and (-webkit-min-device-pixel-ratio:2)" />
    <link rel="apple-touch-startup-image" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/startup-640x1096.png" media="(max-device-width:548px) and (-webkit-min-device-pixel-ratio:2)" />
    <link rel="apple-touch-startup-image" sizes="1024x748" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/startup-1024x748.png" media="screen and (min-device-width:481px) and (max-device-width:1024px) and (orientation:landscape)" />
    <link rel="apple-touch-startup-image" sizes="768x1004" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/startup-768x1004.png" media="screen and (min-device-width:481px) and (max-device-width:1024px) and (orientation:portrait)" />

    <!-- windows pinned site // some nice metadata to make it high quality -->
    <meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/apple-touch-icon-precomposed-144.png" />
    <meta name="msapplication-TileColor" content="#333333" />
    <?php
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
         wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<div id="upgrade"><p class="chromeframe">You are using an <strong>outdated</strong> browser.<br />Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p></div>
<![endif]-->
<div id="page">

    <div id="header"><header role="banner">
        <div id="branding"><section>
            <div id="site-logo"><p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/ladybug-logo.png" alt="lady-bug logo" /></a></p></div>
            <?php
            //<div id="site-title"><p><a href="
            //echo esc_url( home_url( '/' ) );
            //">
            //bloginfo( 'name' );
            //</a></p></div>
            ?>
            <div id="site-description"><p><?php bloginfo( 'description' ); ?></p></div>
            <div id="site-about"><p><?php echo get_theme_mod( 'about_textarea', '' ); ?></p></div>
            <div id="site-linked-in">
                <p>
                    <a title="linkedin profile" target="_blank" href="<?php echo get_theme_mod( 'linkedin_text', '' ); ?>"><i class="fab fa-linkedin fa-lg"></i></a>
                    <?php
		                 /*<a target="_blank" href="<?php echo get_theme_mod( 'github_text', '' ); ?>">github</a>*/
                    ?>
                </p>
            </div>
        </section></div>


            <?php
            //<div id="search">
              //get_search_form();
            //</div>
            //wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
            ?>
            <?php get_sidebar('navigation');?>


    </header></div>
