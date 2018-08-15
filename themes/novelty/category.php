<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<?php

$term = get_queried_object();
$category_option = tt_taxonomy_get_option($term->term_id);
$columns = (int) $category_option['columns'];
$size = round(12/$columns);
$nr = 0;

?>

<div class="content">
    <div class="container">

        <?php

        if($category_option['news_ticker_widget'])
            echo novelty_news_ticker(array(
                'title' => $category_option['news_ticker_title'],
                'category' => $category_option['news_ticker_category'],
                'nr' => $category_option['news_ticker_nr']
            ));

        ?>

        <div class="row"> 
            <div class="col-md-<?php echo is_active_sidebar('blog-sidebar') && $category_option['sidebar'] ? 8 : 12; ?>">

                <div class="site-title"><?php single_cat_title(); ?></div>

                <div class="row"<?php if($category_option['masonry']): ?> data-tesla-plugin="masonry"<?php endif; ?>><!-- start row -->

                <?php while(have_posts()): the_post(); ?>

                <?php if(!$category_option['masonry']&&$nr&&$nr+$size>12): $nr=0; ?>

                </div><!-- end row -->
                <div class="row"><!-- start row -->

                <?php endif; ?>

                <div class="col-md-<?php echo $size; ?>"><!-- start column -->

<?php switch($category_option['layout']): ?>
<?php case 0: ?>

                <div <?php post_class('home-post'); ?>>
                    <div class="row">

                        <?php if(novelty_has_featured()): ?>

                        <div class="col-md-6">
                            <div class="home-post-cover">
                                <?php echo novelty_get_featured(null,false,novelty_image_size($category_option['image_size'])); ?>
                            </div>
                        </div>

                        <?php endif; ?>

                        <div class="col-md-<?php echo novelty_has_featured()?6:12; ?>">
                            <h2 class="home-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="home-post-details">
                                <span><?php _ex('Posted:', 'blog', 'novelty'); ?></span> <?php echo novelty_post_time(); ?><?php if(has_category()): ?> &nbsp; / &nbsp; <?php the_category(', '); ?><?php endif; ?>
                            </div>
                            <?php echo novelty_excerpt(null, (int)$category_option['excerpt_length']); ?>
                            <div class="home-post-more">
                                <a href="<?php the_permalink(); ?>" class="comment-more"><?php comments_number(); ?></a>
                                <a class="click-more" href="<?php the_permalink(); ?>"><?php _ex('read more', 'blog', 'novelty'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

<?php break; ?>
<?php case 1: ?>

                <div <?php post_class('home-post'); ?>>

                    <?php if(novelty_has_featured()): ?>

                    <div class="home-post-cover">
                        <?php echo novelty_get_featured(); ?>
                    </div>

                    <?php endif; ?>
                    
                    <h2 class="home-post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="home-post-details">
                        <span><?php _ex('Posted:', 'blog', 'novelty'); ?></span> <?php echo novelty_post_time(); ?><?php if(has_category()): ?> &nbsp; / &nbsp; <?php the_category(', '); ?><?php endif; ?>
                    </div>
                    <?php echo novelty_excerpt(null, (int)$category_option['excerpt_length']); ?>
                    <div class="home-post-more">
                    <a href="<?php the_permalink(); ?>" class="comment-more"><?php comments_number(); ?></a>
                        <a class="click-more" href="<?php the_permalink(); ?>"><?php _ex('read more', 'blog', 'novelty'); ?></a>
                    </div>
                </div>

<?php break; ?>
<?php default: ?>
<?php endswitch; ?>

                </div><!-- end column -->

                <?php $nr+=$size; ?>

                <?php endwhile; ?>

                </div><!-- end row -->

                <!-- === PAGINATION === -->
                <?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                $total_pages = $wp_query->max_num_pages;
                if ($total_pages > 1) {
                    $current_page = max(1, get_query_var('paged'));
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '/page/%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'type' => 'list',
                        'next_text' => _x('&rarr;', 'pagination', 'novelty'),
                        'prev_text' => _x('&larr;', 'pagination', 'novelty'),
                    ));
                }
                ?>
                <!-- === PAGINATION === -->

            </div>

            <?php if (is_active_sidebar('blog-sidebar') && $category_option['sidebar']): ?>
            
            <div class="col-md-4">
                <div class="sidebar">
                    
                    <?php dynamic_sidebar('blog-sidebar'); ?>

                </div>
            </div>
            
            <?php endif; ?>
            
        </div>

        <?php

        if($category_option['twitter_widget'])
            echo novelty_twitter(array(
                'user' => $category_option['twitter_user'],
                'nr' => $category_option['twitter']
            ));

        ?>

    </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>