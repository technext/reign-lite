<?php

function reign_dynamic_css(){
?>
    <style>
        body{
            margin: 0px;
        }

        .col-md-5th{
            width: 20%;
            float: left;
        }

        .footer-widgets{
            background: <?php echo get_theme_mod('reign_footer_widget_area_background_color'); ?>;
            color: <?php echo get_theme_mod('reign_footer_widget_area_text_color'); ?>;
        }

        .footer-widgets h4{
            color: <?php echo get_theme_mod('reign_footer_widget_area_title_color'); ?>;
            border-bottom: 1px solid <?php get_theme_mod('reign_footer_widget_area_title_color'); ?>;
        }

        .compose-mode .vc_controls>.vc_controls-out-tl{
            top: 0;
        }

        .compose-mode .vc_controls>.vc_controls-bc{
            bottom: 20px;
            z-index: 1002;
        }

        .vc_reign_testimonial_block .vc_controls-container.vc_controls {
            position: absolute;
            top: 0px;
            width: 100%;
            height: 100%;
        }

        .compose-mode .vc_reign_testimonial_block .vc_controls-out-tl {
            top: 35px;
        }

        .compose-mode .vc_reign_testimonial_block .vc_controls-bc {
            bottom: 50px;
        }

        @media only screen and (min-width: 768px) {
            .vc_row.vc_row-stretch-row{
                margin: 0px;
                padding-left: calc((100% - 750px)/2);
                padding-right: calc((100% - 750px)/2);
                padding-left: -webkit-calc((100% - 750px)/2);
                padding-right: -webkit-calc((100% - 750px)/2);
            }
        }

        @media only screen and (min-width: 992px) {
            .vc_row.vc_row-stretch-row{
                margin: 0px;
                padding-left: calc((100% - 970px)/2);
                padding-right: calc((100% - 970px)/2);
                padding-left: -webkit-calc((100% - 970px)/2);
                padding-right: -webkit-calc((100% - 970px)/2);
            }
        }

        @media only screen and (min-width: 1200px){
            .vc_row.vc_row-stretch-row{
                margin: 0px;
                padding-left: calc((100% - 1170px)/2);
                padding-right: calc((100% - 1170px)/2);
                padding-left: -webkit-calc((100% - 1170px)/2);
                padding-right: -webkit-calc((100% - 1170px)/2);
            }
        }

        .vc_element.vc_reign_counter_box {
            width: 33.3333333333%;
            float: left;
        }

        .vc_element.vc_reign_counter_box .col-sm-4 {
            width: 100%;
        }

        .vc_reign_price_box .vc_controls .vc_controls-out-tl {
            top: 30px;
        }

        .vc_reign_price_box .vc_controls>.vc_controls-bc {
            bottom: 80px;
        }

        .compose-mode #client-carousel {
            display: block;
        }

        .compose-mode #client-carousel .client-image {
            display: inline-block;
        }

        .compose-mode .vc_element.vc_reign_button {
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 10px;
        }


    </style>
<?php
}
add_action('wp_head', 'reign_dynamic_css');

?>