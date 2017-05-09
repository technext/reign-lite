<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 4/28/17
 * Time: 6:06 PM
 */

class ContactFormWidget extends WP_Widget{
    function __construct()
    {
        parent::__construct(
            'contact-form-widget',
            __('Contact Form (Homepage)', 'reign-lite'),
            array(
                'description'           => __('Shows Contact Form. This widget is designed for homepage widgeted area only.', 'reign-lite'),
                'classname'             => ''
            )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $contact_form = ( ! empty( $instance['contact_form'] ) ) ? $instance['contact_form'] : false;
        if($contact_form != false):
        $shortcode = '[contact-form-7 id="'.$contact_form.'"]';
        ob_start();
        ?>
        <section class="section blog blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php echo do_shortcode($shortcode); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        echo ob_get_clean();
        endif;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $contact_forms = get_posts(
            array(
                'post_type'         => 'wpcf7_contact_form',
                'posts_per_page'    => -1
            )
        );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'contact_form' ) ); ?>"><?php _e( 'Select the form:', 'reign-lite' ); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('contact_form')); ?>"
                    id="<?php echo esc_attr($this->get_field_id('contact_form')); ?>">
                <?php foreach ($contact_forms as $contact_form): ?>
                    <option value="<?php echo $contact_form->ID ?>"><?php echo $contact_form->post_title; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['contact_form'] = ( ! empty( $new_instance['contact_form'] ) ? $new_instance['contact_form'] : 5 );
        return $instance;
    }
}

?>