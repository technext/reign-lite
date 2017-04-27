<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 4/27/17
 * Time: 8:04 PM
 */

class ReignSectionTitleWidget extends WP_Widget{

    function __construct()
    {
        parent::__construct(
            'section-title-widget',
            __('Section Title (Homepage)', 'reign-light'),
            array(
                'description'       => __('Section Title. This widget is designed for homepage widgeted area only'),
                'classname'         => ''
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
        $section_title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : 'Title';
        $section_subtitle = ( ! empty( $instance['subtitle'] ) ) ? $instance['subtitle'] : 'Subtitle';
        $show_underline = true;
        $style = 'dark';
//        print_r($posts);die();
        ob_start();
        ?>
        <section class="section">
            <div class="container">
                <div class="row">
        <?php if($style == 'light'): ?>
            <div class="dark-bg">
        <?php endif; ?>
        <header class="section-heading <?php if($show_underline) echo ' section-heading-underline'; ?>">
            <?php if($section_title != ''): ?>
                <h2><?php echo $section_title; ?></h2>
            <?php endif; ?>
            <?php if($section_subtitle != ''): ?>
                <span><?php echo $section_subtitle; ?></span>
            <?php endif; ?>
        </header>
        <?php if($style == 'light'): ?>
            </div>
        <?php endif; ?>
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Title' ;
        $subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : 'Subtitle' ;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title', 'reign-light') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title')); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php _e('Subtitle', 'reign-light') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle')); ?>" value="<?php echo $subtitle; ?>">
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
        $instance['title'] = ( ! empty( $new_instance['title'] ) ? $new_instance['title'] : 'Title' );
        $instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ? $new_instance['subtitle'] : 'Subtitle' );
        return $instance;
    }
}

?>