<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<?php if(have_posts()): the_post(); ?>
<div class="content">

    <?php if(!post_password_required()): ?>

    <?php tt_gmap('contact_map','contact_map','map'); ?>

    <div class="container">
        <h1 class="heading-title"><?php _ex('contact us', 'contact template page', 'novelty'); ?></h1>
        <div class="row">
            <div class="col-md-7">
                <div class="contact-form-box">
                    <h2 class="contact-form-title"><?php _ex('zzz Fill the form below', 'contact template page', 'novelty'); ?></h2>
                    <span class="contact-form-write"><?php _ex('write us', 'contact template page', 'novelty'); ?></span>
                    <form class="contact-form" id="contact_form">
                        <input type="text" name="novelty-name" class="contact-line">
                        <span><?php _ex('name', 'contact template page', 'novelty'); ?></span>
                        <input type="text" name="novelty-email" class="contact-line">
                        <span><?php _ex('email', 'contact template page', 'novelty'); ?></span>
                        <input type="text" name="novelty-website" class="contact-line">
                        <span><?php _ex('category', 'contact template page', 'novelty'); ?></span>
                        <textarea name="novelty-message" class="contact-area"></textarea>
                        <span><?php _ex('message', 'contact template page', 'novelty'); ?></span>
                        <div class="clear"></div>
                        <input type="submit" id="contact_send" value="<?php echo htmlspecialchars(_x('Write', 'contact template page', 'novelty')); ?>" class="contact-button">
                        <input type="hidden" name="action" value="novelty_contact" />
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="sidebar">
                    <div class="widget widget-contact">
                    <h2 class="widget-title"><?php _ex('Contact info', 'contact template page', 'novelty'); ?></h2>
                        <ul>
                            <?php
                            $phone_1 = _go('office_phone_1');
                            $phone_2 = _go('office_phone_2');
                            $email = _go('office_email');
                            $address = _go('office_address');
                            ?>
                            <?php if(''!==$phone_1): ?>
                            <li class="widget-contact-phone"><?php echo $phone_1; ?></li>
                            <?php endif; ?>
                            <?php if(''!==$phone_2): ?>
                            <li class="widget-contact-phone"><?php echo $phone_2; ?></li>
                            <?php endif; ?>
                            <?php if(''!==$email): ?>
                            <li class="widget-contact-mail"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                            <?php endif; ?>
                            <?php if(''!==$address): ?>
                            <li class="widget-contact-address"><?php echo nl2br($address); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>

        <?php the_content(); ?>

    </div>

    <?php else: echo get_the_password_form(); endif; ?>
    
</div>
<?php endif; ?>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>