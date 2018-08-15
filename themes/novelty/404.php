<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<div class="content">
    <div class="error-404-header">
        <div class="container">
            <h1 class="site-text-color"><?php _ex('Error 404 *', '404 page', 'novelty'); ?></h1>
        </div>
    </div>
    <div class="container">
        <div class="error-404">
            <?php _ex('<h2>Are you lost?</h2><p>Sorry, the page you asked for couldn\'t be found.<br/> please try using the search form below.</p>', '404 page', 'novelty'); ?>
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>