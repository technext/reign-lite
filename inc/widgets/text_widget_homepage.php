<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 5/9/17
 * Time: 2:56 PM
 */

class TextWidgetHomepage extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'text-widget-homepage',
            __('Text (Homepage)'),
            array(
                'description'       => __('Shows Text block in homepage. This widget is designed for homepage widgeted area only.', 'reign-lite'),
                'classname'         => ''
            ));
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $text = ( ! empty( $instance['text_widget_homepage_text'] ) ? $instance['text_widget_homepage_text'] : '' );
        ?>
        <section class="section">
            <div class="container">
                <div class="row">
                    <?php echo $text; ?>
                </div>
            </div>
        </section>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $text = ( ! empty( $instance['text_widget_homepage_text'] ) ? $instance['text_widget_homepage_text'] : '' );
        ?>
        <div class="text-widget-homepage">
            <label for="<?php echo esc_attr($this->get_field_id('text_widget_homepage_text')); ?>">Text</label>
            <textarea rows="10" class="text-widget-input widefat" name="<?php echo  esc_attr($this->get_field_name('text_widget_homepage_text')); ?>" id="<?php echo  esc_attr($this->get_field_id('text_widget_homepage_text')); ?>"><?php echo $text; ?></textarea>
        </div>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['text_widget_homepage_text'] = ( ! empty( $new_instance['text_widget_homepage_text'] ) ? $new_instance['text_widget_homepage_text'] : '' );
        return $instance;
    }
}

?>