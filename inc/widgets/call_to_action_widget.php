<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 4/28/17
 * Time: 7:52 PM
 */

class CallToActionWidget extends WP_Widget{
    function __construct()
    {
        parent::__construct(
            'call-to-action-widget',
            __('Call To Action (Homepage)', 'reign-lite'),
            array(
                'description'           => __('This widget is designed for homepage widgeted area only.', 'reign-lite'),
                'classname'             => ''
            ));
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $text = ( ! empty( $instance['call-to-action-text'] ) ) ? $instance['call-to-action-text'] : '';
        $link_text = ( ! empty( $instance['button-text'] ) ) ? $instance['button-text'] : '';
        $link_url = ( ! empty( $instance['button-url'] ) ) ? $instance['button-url'] : '';
        $type = ( ! empty( $instance['cta-style'] ) ) ? $instance['cta-style'] : 'with_title';
        $class_name = ($type == 'with_title') ? 'cta-1' : 'cta-2';
        $text_wrapper = ($type == 'with_title') ? 'div' : 'span';
        $new_tab = false;
        ob_start();
        ?>
        <div class="<?php echo $class_name; ?> text-center">
            <div class="container">
                <?php if($type == 'with_title'): ?>
                <div class="call-to-action">
                    <?php endif; ?>
                    <?php if($text != ''): ?>
                    <<?php echo $text_wrapper; ?> class="cta-text"><?php echo $text; ?></<?php echo $text_wrapper; ?>>
            <?php endif; ?>
                <?php if($link_url != '' || $link_text != ''): ?><a class="btn btn-default-o" href="<?php echo ($link_url != '') ? $link_url : '#'; ?>" <?php if($new_tab == true) echo ' target="_blank"' ?>><?php echo $link_text; ?></a>
                <?php endif; ?>
                <?php if($type == 'with_title'): ?>
            </div>
            <?php endif; ?>
        </div>
        </div>
        <?php
        echo ob_get_clean();
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $text = ! empty( $instance['call-to-action-text'] ) ? $instance['call-to-action-text'] : '' ;
        $button_text = ! empty( $instance['button-text'] ) ? $instance['button-text'] : '' ;
        $button_url = ! empty( $instance['button-url'] ) ? $instance['button-url'] : '#' ;
        $style = ! empty( $instance['cta-style'] ) ? $instance['cta-style'] : 'with_title' ;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('call-to-action-text')); ?>">Text</label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('call-to-action-text')); ?>" name="<?php echo esc_attr($this->get_field_name('call-to-action-text')); ?>" value="<?php echo $text; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button-text')); ?>">Link Text</label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('button-text')); ?>" name="<?php echo esc_attr($this->get_field_name('button-text')); ?>" value="<?php echo $button_text; ?>" placeholder="<?php echo __('Link Text', 'reign-lite') ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button-url')); ?>">Link Url</label>
            <input type="url" id="<?php echo esc_attr($this->get_field_id('button-url')); ?>" name="<?php echo esc_attr($this->get_field_name('button-url')); ?>" value="<?php echo $button_url; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cta-style')); ?>">Style</label>
            <select name="<?php echo esc_attr($this->get_field_name('cta-style')); ?>" id="<?php echo esc_attr($this->get_field_id('cta-style')); ?>">
                <option value="with_title" <?php if($style == 'with_title') echo 'selected' ?>>With Title</option>
                <option value="with_paragraph" <?php if($style == 'with_paragraph') echo 'selected' ?>>With Paragraph</option>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['call-to-action-text'] = ( ! empty( $new_instance['call-to-action-text'] ) ? $new_instance['call-to-action-text'] : '' );
        $instance['button-text'] = ( ! empty( $new_instance['button-text'] ) ? $new_instance['button-text'] : '' );
        $instance['button-url'] = ( ! empty( $new_instance['button-url'] ) ? $new_instance['button-url'] : '' );
        $instance['cta-style'] = ( ! empty( $new_instance['cta-style'] ) ? $new_instance['cta-style'] : 'with_title' );
        return $instance;
    }
}

?>