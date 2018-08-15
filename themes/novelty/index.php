<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-<?php echo is_active_sidebar('blog-sidebar')?8:12; ?>">

                <?php if(is_archive()||is_search()): ?>

                <div class="site-title">
                    <?php
                    if(is_archive())
                        if(is_category())
                            single_cat_title();
                        elseif(is_tag())
                            single_tag_title(_x('Tag: ', 'blog', 'novelty'));
                        elseif(is_day())
                            echo get_the_date();
                        elseif(is_month())
                            echo get_the_date('F Y');
                        elseif(is_year())
                            echo get_the_date('Y');
                        else
                            echo 'Archive';
                    elseif(is_search())
                        echo _x('Search:', 'blog', 'novelty').' '.get_search_query();
                    else
                        echo _x('Blog', 'blog', 'novelty');
                    ?>
                </div>

                <?php endif; ?>

                <?php if(have_posts()): ?>

                <?php while(have_posts()): the_post(); ?>

                <div <?php post_class('home-post'); ?>>
                    <div class="row">

                        <?php if(novelty_has_featured()): ?>

                        <div class="col-md-6">
                            <div class="home-post-cover">
                                <?php echo novelty_get_featured(); ?>
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
                            <?php the_excerpt(); ?>
                            <div class="home-post-more">
                                <a href="<?php the_permalink(); ?>" class="comment-more"><?php comments_number(); ?></a>
                                <a class="click-more" href="<?php the_permalink(); ?>"><?php _ex('read more', 'blog', 'novelty'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>

                <?php elseif(is_search()): ?>

                <div class="novelty-no-results">
                    <p><?php _ex('No results. Try searching again.', 'blog', 'novelty'); ?></p>
                    <?php get_search_form(); ?>
                </div>

                <?php endif; ?>

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

            <?php if (is_active_sidebar('blog-sidebar')): ?>
            
            <div class="col-md-4">
                <div class="sidebar">
                    
                    <?php dynamic_sidebar('blog-sidebar'); ?>

                </div>
            </div>
            
            <?php endif; ?>
            
        </div>
        <!-- <div class="twitter_widget" data-user="teslathemes" data-posts="1">
            <h4 class="twitter-title site-text-color">latest tweets</h4>
        </div> -->
    </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>