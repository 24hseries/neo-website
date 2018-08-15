<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <!-- ======================================================================
                                        START HEADER
    ======================================================================= -->    
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url()); ?>">
                            <?php
                                $logo_text = _go('logo_text');
                                if(empty($logo_text)){
                                    $logo_image = _go('logo_image');
                                    if(empty($logo_image))
                                        echo '<strong>'.get_bloginfo('name').'</strong><br/><em>'.get_bloginfo('description').'</em>';
                                    else
                                        echo '<img src="'.$logo_image.'" alt="logo" />';
                                }else{
                                    $logo_text_color = _go('logo_text_color');
                                    if(empty($logo_text_color))
                                        $logo_text_color = '';
                                    else
                                        $logo_text_color = 'color:'.$logo_text_color.';';
                                    $logo_text_font = _go('logo_text_font');
                                    if(empty($logo_text_font))
                                        $logo_text_font = '';
                                    else
                                        $logo_text_font = 'font-family:'.$logo_text_font.';';
                                    $logo_text_size = _go('logo_text_size');
                                    if(empty($logo_text_size))
                                        $logo_text_size = '';
                                    else
                                        $logo_text_size = 'font-size:'.$logo_text_size.'px;';
                                    echo '<span style="'.$logo_text_color.$logo_text_font.$logo_text_size.'">'.$logo_text.'</span>';
                                }
                            ?>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <form class="subscription" id="newsletter" method="post">
                        <span class="subscription-text"><?php _ex('Newsletter subscribe', 'header', 'novelty'); ?></span>
                        <span class="input-cover">
                            <input type="submit" value="" class="subscription-button">
                            <input type="text" name="email" placeholder="<?php _ex('Email ...', 'header', 'novelty'); ?>" class="subscription-line" data-tt-subscription-required data-tt-subscription-type="email">
                            <div class="result_container"></div>
                        </span>
                    </form>
                </div>
                <?php
                $novelty_social = array(
                    'facebook'=>_go('social_platforms_facebook'),
                    'twitter'=>_go('social_platforms_twitter'),
                    'linkedin'=>_go('social_platforms_linkedin'),
                    'rss'=>_go('social_platforms_rss'),
                    'pinterest'=>_go('social_platforms_pinterest'),
                    'youtube'=>_go('social_platforms_youtube'),
                    'flickr'=>_go('social_platforms_flickr'),
                    'behance'=>_go('social_platforms_behance'),
                    'dribbble'=>_go('social_platforms_dribbble'),
                    'google'=>_go('social_platforms_google'),
                    'vimeo'=>_go('social_platforms_vimeo'),
                    'instagram'=>_go('social_platforms_instagram')
                );
                $novelty_social_font = array(
                    'facebook'=>'<i class="fa fa-facebook"></i>',
                    'twitter'=>'<i class="fa fa-twitter"></i>',
                    'linkedin'=>'<i class="fa fa-linkedin"></i>',
                    'rss'=>'<i class="fa fa-rss"></i>',
                    'pinterest'=>'<i class="fa fa-pinterest"></i>',
                    'youtube'=>'<i class="fa fa-youtube"></i>',
                    'flickr'=>'<i class="fa fa-flickr"></i>',
                    'behance'=>'<i class="fa fa-behance"></i>',
                    'dribbble'=>'<i class="fa fa-dribbble"></i>',
                    'google'=>'<i class="fa fa-google-plus"></i>',
                    'vimeo'=>'<i class="fa fa-vimeo-square"></i>',
                    'instagram'=>'<i class="fa fa-instagram"></i>'
                );
                $novelty_social_filtered = array_filter($novelty_social);
                if(!empty($novelty_social_filtered)): ?>
                <div class="col-md-4">
                    <ul class="header-socials">
                        <?php foreach($novelty_social_filtered as $novelty_social_key => $novelty_social_value): ?>
                            <li><a class="header-socials-<?php echo $novelty_social_key; ?>" href="<?php echo $novelty_social_value; ?>"><?php echo $novelty_social_font[$novelty_social_key]; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="menu site-bg-color">
            <div class="container">
                <form class="header-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="submit" id="searchsubmit" value="" class="header-search-button" />
                    <input type="text" value="" name="s" id="s" class="header-search-line" placeholder="<?php _ex('Search ...','search form','novelty'); ?>" />
                </form>
                <div class="responsive-menu">Menu</div>
                <?php wp_nav_menu(array(
                    'theme_location' => 'novelty_menu'
                )); ?>
            </div>
        </div>
    </div>
    <!-- ======================================================================
                                        END HEADER
    ======================================================================= -->    