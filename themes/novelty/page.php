<?php get_header();
$page_sidebar = get_post_meta($post->ID , THEME_NAME . '_sidebar_position', true);
 ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-<?php if(is_active_sidebar('page-sidebar') && $page_sidebar === "sidebar"): echo "8"; else: echo "12"; endif ?>">

                <?php if(have_posts()): the_post(); ?>

                <?php

                $novelty_page_options = array(
                    'disable_title' => true,
                    'disable_share' => true
                );

                ?>

                <?php if(has_category()): ?>
                <h4 class="category-page site-text-color"><?php the_category(', '); ?></h4>
                <?php endif; ?>

                <div class="blog-entry">

                    <?php if(!$novelty_page_options['disable_title']): ?>

                    <div class="entry-header">
                        <h1><?php the_title(); ?></h1>
                    </div>

                    <?php endif; ?>

                    <?php if(novelty_has_featured()): ?>

                    <div class="entry-cover">
                        <?php echo novelty_get_featured(); ?>
                    </div>

                    <?php endif; ?>

                    <?php if(!$novelty_page_options['disable_title']): ?>

                    <div class="entry-content-details">
                        <div class="share-it">
                            <span><?php _ex('Share','single project page','novelty'); ?></span>
                            <ul>
                                <li><span class="st_facebook"></span></li>
                                <li><span class="st_twitter"></span></li>
                                <li><span class="st_googleplus"></span></li>
                            </ul>
                        </div>
                        <span><?php _ex('Posted:', 'blog', 'novelty'); ?></span> <?php echo novelty_post_time(); ?> &nbsp; / &nbsp; <?php _ex('by', 'single post', 'novelty'); ?> <?php the_author_posts_link(); ?> &nbsp; / &nbsp; <a href="<?php echo get_permalink(); ?>"><?php _ex('comments', 'single post', 'novelty'); ?> (<?php echo get_comments_number(); ?>)</a>
                    </div>

                    <?php endif; ?>

                    <div class="entry-content">

                        <?php

                        global $novelty_wide_start;
                        global $novelty_wide_end;

                        if(is_active_sidebar('page-sidebar')){

                            $novelty_wide_start = '';
                            $novelty_wide_end = '';

                        }else{

                            $novelty_wide_start = '</div></div></div></div></div>';
                            $novelty_wide_end = '<div class="container"><div class="row"><div class="col-md-12"><div class="blog-entry"><div class="entry-content">';

                        }

                        ?>

                        <?php the_content(); ?>
                        <?php wp_link_pages(array(
                            'before'           => '<ul class="page-numbers"><li>',
                            'after'            => '</li></ul>',
                            'link_before'      => '',
                            'link_after'       => '',
                            'next_or_number'   => 'number',
                            'separator'        => '</li><li>',
                            'nextpagelink'     => _x( '&rarr;', 'pagination', 'novelty' ),
                            'previouspagelink' => _x( '&larr;', 'pagination', 'novelty' ),
                            'pagelink'         => '%',
                            'echo'             => 1
                        )); ?>
                    </div>

                    <?php comments_template(); ?>

                </div>

                <?php endif; ?>

            </div>

            <?php if(is_active_sidebar('page-sidebar') && $page_sidebar === "sidebar" ): ?>
            
            <div class="col-md-4">
                <div class="sidebar">
                    
                    <?php dynamic_sidebar('page-sidebar'); ?>

                </div>
            </div>

            <?php endif; ?>

        </div>
    </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>