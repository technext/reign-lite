<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 4/28/17
 * Time: 11:48 AM
 */

class AboutUsWidget extends WP_Widget{
    function __construct()
    {
        parent::__construct(
            'about-us-widget',
            __('About Us (Homepage)', 'reign-lite'),
            array(
                'description'           => __('Shows About Us Section. This widget is designed for homepage widgeted area only.', 'reign-lite'),
                'classname'             => ''
            )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $left_title = (!empty($instance['left_title'])) ? $instance['left_title'] : '';
        $left_text = (!empty($instance['left_text'])) ? $instance['left_text'] : '';
        $center_image = (!empty($instance['center_image'])) ? $instance['center_image'] : '';
        $right_title = (!empty($instance['right_title'])) ? $instance['right_title'] : '';
        $right_text = (!empty($instance['right_text'])) ? $instance['right_text'] : '';
        ob_start();
        ?>
        <section class="section about-us">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="about-content left">
                                <h4><?php echo $left_title; ?></h4>
                                <p><?php echo $left_text; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-content-center">
                                <?php if(! empty($center_image)): ?>
                                    <img src="<?php echo $center_image; ?>" alt="Alternative Text">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-content right">
                                <h4><?php echo $right_title; ?></h4>
                                <p><?php echo $right_text; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        echo ob_get_clean();
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $left_title = ! empty( $instance['left_title'] ) ? $instance['left_title'] : '' ;
        $left_text = ! empty( $instance['left_text'] ) ? $instance['left_text'] : '' ;
        $center_image = ! empty( $instance['center_image']) ? $instance['center_image'] : '';
        $right_title = ! empty( $instance['right_title'] ) ? $instance['right_title'] : '' ;
        $right_text = ! empty( $instance['right_text'] ) ? $instance['right_text'] : '' ;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('left_title')); ?>"><?php _e('Title (Left Block)', 'reign-lite') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('left_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('left_title')); ?>" value="<?php echo $left_title; ?>" placeholder="<?php echo __('Left Title', 'reign-lite') ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('left_text')); ?>"><?php echo __('Text (Left Block)', 'reign-lite') ?></label>
            <textarea rows="5" class="widefat" id="<?php echo esc_attr($this->get_field_id('left_text')); ?>" name="<?php echo esc_attr($this->get_field_name('left_text')); ?>" placeholder="<?php echo __('Left Text', 'reign-lite') ?>"><?php echo $left_text; ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('center_image')); ?>"><?php echo __('Image (Center Block)', 'reign-lite') ?></label>
            <a title="Choose Image" href="#" id="widget-about-us-choose-image">Choose Image</a>
            <?php if(!empty($center_image)): ?>
                <img src="<?php echo $center_image; ?>" alt="Image">
            <?php endif; ?>
            <input id="widget-about-us-input" name="<?php echo esc_attr($this->get_field_name('center_image')); ?>" type="hidden" value="<?php echo $center_image; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('right_title')); ?>"><?php _e('Title (Right Block)', 'reign-lite') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('right_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('right_title')); ?>" value="<?php echo $right_title; ?>" placeholder="<?php echo __('Right Title', 'reign-lite'); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('right_text')); ?>"><?php echo __('Text (Right Block)', 'reign-lite') ?></label>
            <textarea rows="5" class="widefat" id="<?php echo esc_attr($this->get_field_id('right_text')); ?>" name="<?php echo esc_attr($this->get_field_name('right_text')); ?>" placeholder="<?php echo __('Right Text', 'reign-lite') ?>"><?php echo $right_text; ?></textarea>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['left_title'] = ( ! empty( $new_instance['left_title'] ) ? $new_instance['left_title'] : '' );
        $instance['left_text'] = ( ! empty( $new_instance['left_text'] ) ? $new_instance['left_text'] : '' );
        $instance['center_image'] = ( ! empty( $new_instance['center_image'] ) ? $new_instance['center_image'] : '' );
        $instance['right_title'] = ( ! empty( $new_instance['right_title'] ) ? $new_instance['right_title'] : '' );
        $instance['right_text'] = ( ! empty( $new_instance['right_text'] ) ? $new_instance['right_text'] : '' );
        return $instance;
    }
}

?>