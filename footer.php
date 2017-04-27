<?php
/**
 * The footer template
 */
?>
    <?php if(reign_is_footer_widget_area_active()): ?>
        <section id="footer-widgets" class="section footer-widgets dark-bg">
            <div class="container">
                <div class="row">
                    <?php $number_of_column = get_option('reign_number_of_footer_widget_column'); ?>
                    <?php $n_f_w = intval($number_of_column); ?>
                    <?php $footer_widget_class = get_footer_column_class($n_f_w); ?>
                    <?php for($i = 1; $i <= $n_f_w; $i++ ): ?>
                        <div class="<?php echo $footer_widget_class; ?> widget-wrapper content-wrap">
                            <?php dynamic_sidebar('footer-widget-'.$i ); ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
        <!-- footer -->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <?php $left_column_text = get_theme_mod('reign_left_column_text'); ?>
                        <p class="copyright text-xs-center"><?php echo (isset($left_column_text) && $left_column_text != '') ? $left_column_text : '&copy; 2015 <a href="https://www.wpwagon.com">WP Wagon</a>'; ?></p>
                    </div>
                    <div class="col-md-5 col-sm-4">
                        <?php if(reign_has_any_footer_social_links()): ?>
                            <ul class="footer-social-block">
                                <?php if(reign_get_footer_facebook_url() != ''): ?>
                                    <li><a href="<?php echo reign_get_footer_facebook_url(); ?>"><i class="fa fa-facebook"></i></a> </li>
                                <?php endif; ?>
                                <?php if(reign_get_footer_twitter_url() != ''): ?>
                                    <li><a href="<?php echo reign_get_footer_twitter_url(); ?>"><i class="fa fa-twitter"></i></a> </li>
                                <?php endif; ?>
                                <?php if(reign_get_footer_pinterest_url() != ''): ?>
                                    <li><a href="<?php echo reign_get_footer_pinterest_url(); ?>"><i class="fa fa-pinterest"></i></a> </li>
                                <?php endif; ?>
                                <?php if(reign_get_footer_behance_url() != ''): ?>
                                    <li><a href="<?php echo reign_get_footer_behance_url(); ?>"><i class="fa fa-behance"></i></a> </li>
                                <?php endif; ?>
                                <?php if(reign_get_footer_google_plus_url() != ''): ?>
                                    <li><a href="<?php echo reign_get_footer_google_plus_url(); ?>"><i class="fa fa-google-plus"></i></a> </li>
                                <?php endif; ?>
                                <?php if(reign_get_footer_linkedin_url() != ''): ?>
                                    <li><a href="<?php echo reign_get_footer_linkedin_url(); ?>"><i class="fa fa-linkedin"></i></a> </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <?php echo get_theme_mod('reign_right_column_text'); ?>
                    </div>
                </div>
            </div>
        </footer>

        <a id="totop" href="#totop"><i class="fa fa-angle-double-up"></i></a>

<?php wp_footer(); ?>

        <!--[if lt IE 10]>
        <script>
            $('input, textarea').placeholder();
        </script>
        <![endif]-->

    </body>
</html>

