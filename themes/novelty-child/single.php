<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-<?php echo is_active_sidebar('blog-sidebar')?8:12; ?>">

                <?php if(have_posts()): the_post(); ?>

                <h4 class="category-page site-text-color"><?php the_category(', '); ?></h4>

                <div class="blog-entry">
                    <?php if(novelty_has_featured()): ?>

                    <div class="entry-cover">
                        <?php echo novelty_get_featured(); ?>
                    </div>
                    <?php endif; ?>
					<div class="entry-header">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="entry-content-details">
                        <div class="share-it">
                            <span class="share-it-span"><?php _ex('Share','single project page','novelty'); ?></span>
                            <div>
                                <ul>
                                    <li><span class="st_facebook"></span></li>
                                    <li><span class="st_twitter"></span></li>
                                    <li><span class="st_googleplus"></span></li>
                                </ul>
                            </div>
                        </div>
                        <span><?php _ex('Posted:', 'blog', 'novelty'); ?></span> <?php echo novelty_post_time(); ?> &nbsp;/&nbsp; <?php _ex('by', 'single post', 'novelty'); ?> <?php the_author_posts_link(); ?>
                    </div>
                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages(array(
                            'before'           => '<ul class="page-numbers">',
                            'after'            => '</ul>',
                            'link_before'      => '',
                            'link_after'       => '',
                            'next_or_number'   => 'number',
                            'separator'        => '',
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

            <?php if (is_active_sidebar('blog-sidebar')): ?>
            
            <div class="col-md-4">
                <div class="sidebar">
                    
                    <?php dynamic_sidebar('blog-sidebar'); ?>

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