    <!-- =====================================================================
                                         START FOOTER
    ====================================================================== -->
    <div class="footer">
        <div class="container">
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-left-sidebar'); ?>
            </div>
            <div class="col-md-6">
                <?php dynamic_sidebar('footer-middle-sidebar'); ?>
            </div>
            <div class="col-md-2">
                <?php dynamic_sidebar('footer-right-sidebar'); ?>
            </div>
        </div>
        <div class="footer-copyright">
            <?php _ex('Copyright 2015 <span>Novelty</span> Designed by <a href="http://www.teslathemes.com" target="_blank">Teslathemes</a>', 'footer copyright', 'novelty'); ?>
        </div>
    </div>
    <!-- =====================================================================
                                         END FOOTER
    ====================================================================== -->

    <?php wp_footer(); ?>
    
</body>

</html>