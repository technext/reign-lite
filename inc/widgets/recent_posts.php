<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/22/16
 * Time: 2:43 PM
 */

class Reign_Widget_Recent_Post extends WP_Widget{
    function __construct()
    {
        parent::__construct(
            'reign_widget_recent_post',
            __('Recent Posts', 'reign-light'),
            array(
                'description'   => __('Shows Recent Posts', 'reign-light'),
                'classname'     => 'content-wrap widget-recent-posts'
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
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        $number_of_posts = ( ! empty( $instance['number_of_posts'] ) ) ? $instance['number_of_posts'] : 5;
        $show_post_author_name = ( ! empty( $instance['show_post_author_name'] ) ) ? ( ( $instance['show_post_author_name'] == 'on' ) ? true : false ) : false;
        $posts = get_posts(
            array(
                'posts_per_page'    => $number_of_posts,
                'order_by'          => 'date',
                'order'             => 'DESC'
            )
        );
//        print_r($posts);die();
        ob_start();
        ?>
        <ul>
            <?php foreach ($posts as $post ): ?>
                <li>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="post-title"><?php echo $post->post_title; ?></a>
                    <?php if($show_post_author_name) : ?>
                        by
                        <a href="<?php echo get_the_author_link($post->post_author); ?>" class="author"><?php echo get_userdata($post->post_author)->display_name; ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'reign-light' );
        $number_of_posts = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 5 ;
        $show_post_author_name = ! empty( $instance['show_post_author_name'] ) ? $instance['show_post_author_name'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php _e( esc_attr( 'Number of posts:') ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="number" value="<?php echo $number_of_posts; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_post_author_name' ) ); ?>"><?php _e( esc_attr( 'Show Post Author Name:' ) ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_post_author_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_post_author_name' ) ); ?>" type="checkbox" <?php echo ($show_post_author_name == 'on') ? 'checked' : '' ?>>
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
//        print_r($new_instance);die();
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ? $new_instance['number_of_posts'] : 5 );
        $instance['show_post_author_name'] = ( ! empty($new_instance['show_post_author_name'] ) ? $new_instance['show_post_author_name'] : 'off' );

        return $instance;
    }
}

?>