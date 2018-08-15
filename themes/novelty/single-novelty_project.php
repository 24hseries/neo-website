<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<?php if(have_posts()): the_post(); ?>
<?php $novelty_metabox_template_options = novelty_metabox_template_options_get(get_the_ID()); ?>
<div class="content">
    <div class="container">
        <?php echo Tesla_slider::get_slider_html('novelty_project', array('output_id'=>'single','post_id'=>get_the_id())); ?>
    </div>
</div>
<?php endif; ?>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>