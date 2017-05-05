<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 5/3/17
 * Time: 12:35 PM
 */

class ReignContentBoxWidget extends WP_Widget{
    public $ionicons;
    function __construct()
    {
        include get_template_directory().'/inc/widgets/icons.php';
        $this->ionicons = $icons;
        parent::__construct(
            'content-box-widget',
            __('Content Box (Homepage)', 'reign-light'),
            array(
                'description'           => __('Shows Content Boxes. This widget is designed for homepage widgeted area only.', 'reign-light'),
                'classname'             => ''
            ));
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $number_of_column = ! empty($instance['content-box-col-number']) ? $instance['content-box-col-number'] : 3;
        $number_of_content_boxes = ! empty($instance['content-box-content-box-number']) ? $instance['content-box-content-box-number'] : 3;
        $col_class = reign_get_column_layout($number_of_column);
        ob_start();
        ?>
        <section class="section services">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <?php for ($i = 1; $i <= $number_of_content_boxes; $i++): ?>
                            <?php $content_box_icon = !empty($instance['content-box-'.$i.'-icon']) ? $instance['content-box-'.$i.'-icon'] : ''; ?>
                            <?php $content_box_title = !empty($instance['content-box-'.$i.'-title']) ? $instance['content-box-'.$i.'-title'] : __('Title', 'reign-light'); ?>
                            <?php $content_box_description = !empty($instance['content-box-'.$i.'-description']) ? $instance['content-box-'.$i.'-description'] : __('Description', 'reign-light'); ?>
                            <div class="service <?php echo $col_class; ?>">
                                <?php if($content_box_icon != ''): ?>
                                    <div class="service-icon text-center">
                                        <span class="<?php echo $content_box_icon; ?>"></span>
                                    </div>
                                <?php endif; ?>
                                <div class="about-service">
                                    <?php if($content_box_title != ''): ?>
                                        <h4 class="text-center"><?php echo $content_box_title; ?></h4>
                                    <?php endif; ?>
                                    <?php if($content_box_description != ''): ?>
                                        <p class="text-center"><?php echo $content_box_description; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        echo ob_get_clean();
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $number_of_column = ! empty($instance['content-box-col-number']) ? $instance['content-box-col-number'] : 3;
        $number_of_content_boxes = ! empty($instance['content-box-content-box-number']) ? $instance['content-box-content-box-number'] : 3;

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content-box-col-number')); ?>"><?php echo __('Number of Columns', 'reign-light'); ?></label>
            <select class="widefat" name="<?php echo esc_attr($this->get_field_name('content-box-col-number')); ?>"
                    id="<?php echo esc_attr($this->get_field_id('content-box-col-number')); ?>">
                <option value="1" <?php echo $number_of_column == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?php echo $number_of_column == 2 ? 'selected' : '' ?>>2</option>
                <option value="3" <?php echo $number_of_column == 3 ? 'selected' : '' ?>>3</option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content-box-content-box-number')); ?>"><?php echo __('Number of Content Boxes', 'reign-light') ?></label>
            <input type="number" class="widefat" name="<?php echo esc_attr($this->get_field_name('content-box-content-box-number')); ?>" id="<?php echo esc_attr($this->get_field_id('content-box-content-box-number')); ?>" value="<?php echo $number_of_content_boxes; ?>">
        </p>
        <?php for ($i = 1; $i <= $number_of_content_boxes; $i++): ?>
        <?php $content_box_icon = !empty($instance['content-box-'.$i.'-icon']) ? $instance['content-box-'.$i.'-icon'] : ''; ?>
        <?php $content_box_title = !empty($instance['content-box-'.$i.'-title']) ? $instance['content-box-'.$i.'-title'] : __('Title', 'reign-light'); ?>
        <?php $content_box_description = !empty($instance['content-box-'.$i.'-description']) ? $instance['content-box-'.$i.'-description'] : __('Description', 'reign-light'); ?>

        <div class="team-member">
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('content-box-'.$i.'-icon')); ?>"><?php echo __('Icon', 'reign-light') ?></label>
                    <select class="widefat font-picker" name="<?php echo esc_attr($this->get_field_name('content-box-'.$i.'-icon')); ?>" id="<?php echo esc_attr($this->get_field_id('content-box-'.$i.'-icon')); ?>">
                        <option value="">No Icon</option>
                        <?php foreach ($this->ionicons as $icon): ?>
                            <?php foreach ($icon as $key=>$value): ?>
                                <option value="<?php echo $key; ?>" <?php echo $content_box_icon == $key ? 'selected' : '' ?>><?php echo $key; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('content-box-'. $i . '-title')); ?>"><?php echo __('Title', 'reign-light') ?></label>
                    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('content-box-'. $i . '-title')); ?>" name="<?php echo esc_attr($this->get_field_name('content-box-'. $i . '-title')); ?>" value="<?php echo $content_box_title; ?>">
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('content-box-'.$i.'-description')); ?>"><?php echo __('Description', 'reign-light') ?></label>
                    <textarea class="widefat" name="<?php echo esc_attr($this->get_field_name('content-box-'.$i.'-description')); ?>" id="<?php echo esc_attr($this->get_field_id('content-box-'.$i.'-description')); ?>" cols="5"><?php echo $content_box_description; ?></textarea>
                </p>
            </div>
        <?php endfor; ?>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['content-box-col-number'] = ( ! empty( $new_instance['content-box-col-number'] ) ? $new_instance['content-box-col-number'] : '' );
        $number_of_content_boxes = $instance['content-box-content-box-number'] = ( ! empty( $new_instance['content-box-content-box-number'] ) ? $new_instance['content-box-content-box-number'] : '' );
        for($i = 1; $i <= $number_of_content_boxes; $i++){
            $instance['content-box-'.$i.'-icon'] = ( ! empty( $new_instance['content-box-'.$i.'-icon'] ) ? $new_instance['content-box-'.$i.'-icon'] : '' );
            $instance['content-box-'.$i.'-title'] = ( ! empty( $new_instance['content-box-'.$i.'-title'] ) ? $new_instance['content-box-'.$i.'-title'] : __('Title', 'reign-light') );
            $instance['content-box-'.$i.'-description'] = ( ! empty( $new_instance['content-box-'.$i.'-description'] ) ? $new_instance['content-box-'.$i.'-description'] : __('Description', 'reign-light') );
        }
        return $instance;
    }
}

?>