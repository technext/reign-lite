<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 7/29/16
 * Time: 8:30 PM
 */
wp_head();
?>
<body data-spy="scroll" data-target="#main-nav-collapse" data-offset="100">

<div class="page-loader">
    <div class="loader">Loading...</div>
</div>
<section class="four-o-four" style="background: url('<?php echo get_template_directory_uri().'/assets/images/404.jpg'; ?>');background-size: contain;background-position: 20% center;background-repeat: no-repeat;">
    <div class="four-o-four-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <img src="<?php echo get_template_directory_uri().'/assets/images/404.jpg'; ?>" class="four-o-four-img visible-xs" alt=""/>
                    <h3>Oops! Looks like you're lost.</h3>
                    <p>Please go back and try to find it again </p>
                    <h1>404</h1>
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-default">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
wp_footer();
?>

</body>
