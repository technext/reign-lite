<?php

/**
 * Class PostsWidget
 * This class will create a widget for homepage widgeted area
 */
class ReignPostsWidget extends WP_Widget{

    function __construct()
    {
        parent::__construct(
            'post-widget',
            __('Posts (Homepage)', 'reign-lite'),
            array(
                'description'       => __('Shows Posts. This widget is designed for homepage widgeted area only', 'reign-lite'),
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
        $number_of_posts = ( ! empty( $instance['number_of_posts'] ) ) ? $instance['number_of_posts'] : 5;
        $posts = get_posts(
            array(
                'posts_per_page'    => $number_of_posts,
                'order_by'          => 'date',
                'order'             => 'DESC'
            )
        );
        ob_start();
        ?>
        <!-- Blog -->
        <section id="blog" class="section blog blog-grid">
            <div class="container">
                <div id="blogContent" class="section-content">
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                            <?php setup_postdata($post->ID); ?>
                            <!--                        --><?php //print_r(get_userdata($post->post_author)->data->user_login);die(); ?>
                            <div class="col-md-4">
                                <div class="blog-post">
                                    <header>
                                        <h4 class="date"><?php echo get_the_date('d',$post->ID); ?><br><?php echo get_the_date('M', $post->ID); ?></h4>
                                        <div class="blog-element">
                                            <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                                        </div>
                                    </header>
                                    <div class="blog-content">
                                        <h4><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h4>
                                        <div class="post-meta">
                                            <span>By <a href="<?php echo get_the_author_link($post->ID); ?>"><?php echo get_userdata($post->post_author)->data->user_login; ?></a></span>
                                            <span><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_comments_number($post->ID).' Comments'; ?></a></span>
                                        </div>
                                        <p><?php echo reign_get_excerpt($post, 75, false); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div><!--/#blogContent-->

                <div class="text-center">
                    <a id="loadBlogPosts" href="<?php echo get_permalink(get_option('page_for_posts')) ?>" class="btn btn-dark">View All <span class="fa fa-angle-double-right"></span></a>
                </div>

            </div><!--/.container-->
        </section>
        <!-- Blog -->
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
        $number_of_posts = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 5 ;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php _e( 'Number of posts:', 'reign-lite' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="number" value="<?php echo $number_of_posts; ?>">
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
        $instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ? $new_instance['number_of_posts'] : 5 );
        return $instance;
    }

}

?>