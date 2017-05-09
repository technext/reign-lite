<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 5/2/17
 * Time: 2:30 PM
 */


class ReignFunFactsWidget extends WP_Widget{
    public $ionicons;
    function __construct()
    {
        include get_template_directory().'/inc/widgets/icons.php';
        $this->ionicons = $icons;
        parent::__construct(
            'funfact-widget',
            __('Fun Fact (Home)', 'reign-lite'),
            array(
                'description'               => __('Shows funfact section. This widget is designed for homepage widgeted area only.', 'reign-lite'),
                'classname'                 => ''
            ));
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $title = (! empty($instance['funfacts-title']) ? $instance['funfacts-title'] : '');
        $subtitle = (! empty($instance['funfacts-subtitle']) ? $instance['funfacts-subtitle'] : '');
        $background = (! empty($instance['funfacts-bg']) ? $instance['funfacts-bg'] : '');
        $number_of_column = (! empty($instance['funfacts-col-number']) ? $instance['funfacts-col-number'] : 3);
        $number_of_counter_box = (! empty($instance['funfacts-counter-box-number']) ? $instance['funfacts-counter-box-number'] : 3);
        $col_class = reign_get_column_layout($number_of_column);
        ob_start();
            ?>
            <div class="section dark-bg funfacts" <?php if($background != ''): ?>style="background: url('<?php echo $background;?>');background-size: cover;background-position: center center;" <?php endif; ?>>
                <div class="color-overlay"></div>
                <div class="container">
                    <?php if($title != '' || $subtitle != ''): ?>
                        <header class="section-heading">
                            <?php if($title != ''): ?>
                                <h2><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if($subtitle != ''): ?>
                                <span><?php echo $subtitle; ?></span>
                            <?php endif; ?>
                        </header>
                    <?php endif; ?>
                    <div class="section-content">
                        <div class="row">
                            <?php for($i = 1; $i <= $number_of_counter_box; $i++): ?>
                                <?php $counting_icon = ! empty( $instance['funfacts-counter-'.$i.'-icon'] ) ? $instance['funfacts-counter-'.$i.'-icon'] : '' ?>
                                <?php $counting_number = ! empty( $instance['funfacts-counter-'.$i.'-number'] ) ? $instance['funfacts-counter-'.$i.'-number'] : '' ?>
                                <?php $counting_description = ! empty( $instance['funfacts-counter-'.$i.'-description'] ) ? $instance['funfacts-counter-'.$i.'-description'] : __('Description', 'reign-lite') ?>
                                <div class="<?php echo $col_class; ?>">
                                    <div class="counter-box">
                                        <?php if(isset($counting_icon) && $counting_icon != ''): ?>
                                            <div class="counter-icon">
                                                <span class="<?php echo $counting_icon; ?>"></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="count number"><?php echo $counting_number; ?></div>
                                        <div class="count-description"><?php echo $counting_description; ?></div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            echo ob_get_clean();
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = (! empty($instance['funfacts-title']) ? $instance['funfacts-title'] : '');
        $subtitle = (! empty($instance['funfacts-subtitle']) ? $instance['funfacts-subtitle'] : '');
        $bg = (! empty($instance['funfacts-bg']) ? $instance['funfacts-bg'] : '');
        $number_of_column = (! empty($instance['funfacts-col-number']) ? $instance['funfacts-col-number'] : 3);
        $number_of_counter_box = (! empty($instance['funfacts-counter-box-number']) ? $instance['funfacts-counter-box-number'] : 3);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'funfacts-title' ) ); ?>"><?php _e( 'Title:', 'reign-lite' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('funfacts-title')); ?>" name="<?php echo esc_attr($this->get_field_name('funfacts-title')); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'funfacts-subtitle' ) ); ?>"><?php _e( 'Subtitle:', 'reign-lite' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('funfacts-subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('funfacts-subtitle')); ?>" value="<?php echo $subtitle; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('funfacts-bg')); ?>"><?php echo __('Background Image', 'reign-lite') ?></label>
            <a class="funfacts-bg" id="funfacts-bg" data-target="<?php echo esc_attr($this->get_field_id('funfacts-bg')) ?>" href="#">Choose an image.</a>
            <small>Suggested image size: 1265px X 570px or it's proportional</small>
            <?php if(isset($bg) && $bg != ''): ?>
            <img src="<?php echo $bg; ?>" alt="Alternatie button">
            <?php endif; ?>
            <input type="hidden" value="<?php echo $bg; ?>" name="<?php echo esc_attr($this->get_field_name('funfacts-bg')); ?>" id="<?php echo esc_attr($this->get_field_id('funfacts-bg')) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('funfacts-col-number')); ?>"><?php echo __('Number of Column', 'reign-lite') ?></label>
            <select class="widefat" name="<?php echo esc_attr($this->get_field_name('funfacts-col-number')); ?>"
                    id="<?php echo esc_attr('funfacts-col-number'); ?>">
                <option value="1" <?php echo $number_of_column == 1 ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo $number_of_column == 2 ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo $number_of_column == 3 ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo $number_of_column == 4 ? 'selected' : ''; ?>>4</option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('funfacts-counter-box-number')) ?>"><?php echo __('Number of Counter Boxes', 'reign-lite') ?></label>
            <input type="number" class="widefat" id="<?php echo esc_attr($this->get_field_id('funfacts-counter-box-number')) ?>" name="<?php echo esc_attr($this->get_field_name('funfacts-counter-box-number')) ?>" value="<?php echo $number_of_counter_box; ?>">
        </p>
        <?php for($i = 1; $i <= $number_of_counter_box; $i++): ?>
            <?php $counter_icon = !empty($instance['funfacts-counter-'.$i.'-icon']) ? $instance['funfacts-counter-'.$i.'-icon'] : ''; ?>
            <?php $counter_number = !empty($instance['funfacts-counter-'.$i.'-number']) ? $instance['funfacts-counter-'.$i.'-number'] : ''; ?>
            <?php $counter_description = !empty($instance['funfacts-counter-'.$i.'-description']) ? $instance['funfacts-counter-'.$i.'-description'] : ''; ?>

            <div class="team-member">
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('funfacts-counter-'.$i.'-icon')); ?>"><?php echo __('Icon', 'reign-lite') ?></label>
                    <select class="widefat font-picker" name="<?php echo esc_attr($this->get_field_name('funfacts-counter-'.$i.'-icon')); ?>" id="<?php echo esc_attr($this->get_field_id('funfacts-counter-'.$i.'-icon')); ?>">
                        <option value="">No Icon</option>
                        <?php foreach ($this->ionicons as $icon): ?>
                            <?php foreach ($icon as $key=>$value): ?>
                                <option value="<?php echo $key; ?>" <?php echo $counter_icon == $key ? 'selected' : '' ?>><?php echo $key; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('funfacts-counter-'.$i.'-number')) ?>"><?php echo __('Counter Number', 'reign-lite') ?></label>
                    <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('funfacts-counter-'.$i.'-number')) ?>" name="<?php echo esc_attr($this->get_field_name('funfacts-counter-'.$i.'-number')) ?>" value="<?php echo $counter_number; ?>">
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('funfacts-counter-'.$i.'-description')) ?>"><?php echo __('Counter Description', 'reign-lite') ?></label>
                    <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('funfacts-counter-'.$i.'-description')) ?>" name="<?php echo esc_attr($this->get_field_name('funfacts-counter-'.$i.'-description')) ?>" value="<?php echo $counter_description; ?>">
                </p>
            </div>
        <?php endfor; ?>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['funfacts-title'] = ( ! empty( $new_instance['funfacts-title'] ) ? $new_instance['funfacts-title'] : '' );
        $instance['funfacts-subtitle'] = ( ! empty( $new_instance['funfacts-subtitle'] ) ? $new_instance['funfacts-subtitle'] : '' );
        $instance['funfacts-bg'] = ( ! empty( $new_instance['funfacts-bg'] ) ? $new_instance['funfacts-bg'] : '' );
        $instance['funfacts-col-number'] = ( ! empty( $new_instance['funfacts-col-number'] ) ? $new_instance['funfacts-col-number'] : 3 );
        $counter_box_number = $instance['funfacts-counter-box-number'] = ( ! empty( $new_instance['funfacts-counter-box-number'] ) ? $new_instance['funfacts-counter-box-number'] : 3 );
        for($i = 1; $i <= $counter_box_number; $i++){
            $instance['funfacts-counter-'.$i.'-icon'] = ( ! empty( $new_instance['funfacts-counter-'.$i.'-icon'] ) ? $new_instance['funfacts-counter-'.$i.'-icon'] : '' );
            $instance['funfacts-counter-'.$i.'-number'] = ( ! empty($new_instance['funfacts-counter-'.$i.'-number']) ? $new_instance['funfacts-counter-'.$i.'-number'] : '' );
            $instance['funfacts-counter-'.$i.'-description'] = ( ! empty( $new_instance['funfacts-counter-'.$i.'-description'] ) ? $new_instance['funfacts-counter-'.$i.'-description'] : '' );
        }
        return $instance;
    }
}

?>