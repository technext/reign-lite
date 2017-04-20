<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 8/2/16
 * Time: 11:48 AM
 */

function reign_custom_css(){
    ?>
    <style>
        <?php $custom_css = get_option('reign_custom_css', ''); ?>
        <?php echo $custom_css; ?>
    </style>
    <?php
}
add_action('wp_head', 'reign_custom_css');