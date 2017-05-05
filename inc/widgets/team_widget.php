<?php
/**
 * Created by PhpStorm.
 * User: aqibashef
 * Date: 4/29/17
 * Time: 12:06 PM
 */

class ReignTeamWidget extends WP_Widget{
    function __construct()
    {
        parent::__construct(
            'reign-team-widget',
            __('Team (Homepage)', 'reign-light'),
            array(
                'description'           => __('Shows Team Section. This widget is designed for homepage widgeted area only.', 'reign-light'),
                'classname'             => ''
            ));
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $number_of_team_members = ( ! empty( $instance['number_of_team_members'] ) ) ? $instance['number_of_team_members'] : 0;
        $columns = ! empty( $instance['team_number_of_column'] ) ? $instance['team_number_of_column'] : 3 ;
        $col_class = reign_get_column_layout(intval($columns));
        ob_start();
        ?>
        <section class="section team">
            <div class="section-content">
                <?php $indx = 1; ?>
                <?php for ($i = 1; $i <= $number_of_team_members; $i++): ?>
                    <?php $name = !(empty($instance['team-member-' . $i . '-name'])) ? $instance['team-member-' . $i . '-name'] : 'Team Member ' . $i; ?>
                    <?php $image = !(empty($instance['team-member-'. $i .'-image'])) ? $instance['team-member-'. $i .'-image'] : '' ?>
                    <?php $designation = !(empty($instance['team-member-' . $i . '-designation'])) ? $instance['team-member-' . $i . '-designation'] : 'Team Member ' . $i . ' Designation'; ?>
                    <?php $fb_url = !(empty($instance['team-member-' . $i . '-fb-url'])) ? $instance['team-member-' . $i . '-fb-url'] : ''; ?>
                    <?php $twitter_url = !(empty($instance['team-member-' . $i . '-twitter-url'])) ? $instance['team-member-' . $i . '-twitter-url'] : ''; ?>
                    <?php $linkedin_url = !(empty($instance['team-member-' . $i . '-linkedin-url'])) ? $instance['team-member-' . $i . '-linkedin-url'] : ''; ?>
                    <?php $googleplus_url = !(empty($instance['team-member-' . $i . '-googleplus-url'])) ? $instance['team-member-' . $i . '-googleplus-url'] : ''; ?>

            <?php if($indx % intval($columns) == 1): ?>
                        <div class="row">
                    <?php endif; ?>
                    <div class="<?php echo $col_class; ?> team-bio-wrapper" style="border-right: 1px solid #ccc;<?php if($indx % intval($columns) == 1): ?>border-left: 1px solid #cccccc;<?php endif; ?>">
                        <!-- team-member's-bio -->
                        <div class="team-bio">
                            <?php if($image != ''): ?>
                            <figure>
                                <img src="<?php echo (isset($image) && $image != '') ? $image : '' ?>" class="img-responsive center-block" alt="">
                            </figure>
                            <?php endif; ?>
                            <div class="team-description">
                                <?php if(isset($name) && $name != ''): ?>
                                    <div class="member-name"><?php echo $name; ?></div>
                                <?php endif; ?>
                                <?php if(isset($designation)): ?>
                                    <div class="designation"><?php echo $designation; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- team-member's-social -->
                            <div class="team-social">
                                <ul class="social-block">
                                    <?php if(isset($fb_url) && $fb_url != ''): ?>
                                        <li><a href="<?php echo $fb_url; ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(isset($twitter_url) && $twitter_url != ''): ?>
                                        <li><a href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(isset($linkedin_url) && $linkedin_url != ''): ?>
                                        <li><a href="<?php echo $linkedin_url; ?>"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(isset($googleplus_url) && $googleplus_url != ''): ?>
                                        <li><a href="<?php echo $googleplus_url; ?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div><!--/team bio-->
                    </div>
                    <?php if($indx % intval($columns) == 0): ?>
                        </div>
                    <?php endif; ?>
                    <?php $indx++; ?>
                <?php endfor; ?>
            </div><!-- section-content -->
        </section>
        <?php
        echo ob_get_clean();
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $number_of_team_members = ! empty( $instance['number_of_team_members'] ) ? $instance['number_of_team_members'] : 0 ;
        $number_of_columns = ! empty( $instance['team_number_of_column'] ) ? $instance['team_number_of_column'] : 3 ;
        ?>
        <p>
            If you want to change the number of members,
            first change the number of members and click
            save to get acurate number of input sections.
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_team_members' ) ); ?>"><?php _e( 'Number of Team Members:', 'reign-light' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_team_members' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_team_members' ) ); ?>" type="number" value="<?php echo $number_of_team_members; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('team_number_of_column')); ?>"><?php echo __('Number of Column', 'reign-light') ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('team_number_of_column')); ?>" id="<?php echo esc_attr($this->get_field_id('team_number_of_column')); ?>" class="widefat">
                <option value="1" <?php echo $number_of_columns == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?php echo $number_of_columns == 2 ? 'selected' : '' ?>>2</option>
                <option value="3" <?php echo $number_of_columns == 3 ? 'selected' : '' ?>>3</option>
            </select>
        </p>
        <?php if($number_of_team_members > 0): ?>
            <?php for($i = 1; $i <= $number_of_team_members; $i++): ?>
                <div class="team-member">
                    <?php $name = !(empty($instance['team-member-' . $i . '-name'])) ? $instance['team-member-' . $i . '-name'] : 'Team Member ' . $i; ?>
                    <?php $image = !(empty($instance['team-member-'. $i .'-image'])) ? $instance['team-member-'. $i .'-image'] : '' ?>
                    <?php $designation = !(empty($instance['team-member-' . $i . '-designation'])) ? $instance['team-member-' . $i . '-designation'] : 'Team Member ' . $i . ' Designation'; ?>
                    <?php $fb_url = !(empty($instance['team-member-' . $i . '-fb-url'])) ? $instance['team-member-' . $i . '-fb-url'] : ''; ?>
                    <?php $twitter_url = !(empty($instance['team-member-' . $i . '-twitter-url'])) ? $instance['team-member-' . $i . '-twitter-url'] : ''; ?>
                    <?php $linkedin_url = !(empty($instance['team-member-' . $i . '-linkedin-url'])) ? $instance['team-member-' . $i . '-linkedin-url'] : ''; ?>
                    <?php $googleplus_url = !(empty($instance['team-member-' . $i . '-googleplus-url'])) ? $instance['team-member-' . $i . '-googleplus-url'] : ''; ?>

                    <h4><?php echo $name ?></h4>
                    <p>
                        <label for="<?php echo esc_attr($this->get_field_id('team-member-' . $i . '-name')); ?>"><?php echo __('Name', 'reign-light'); ?></label>
                        <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('team-member-' . $i . '-name')); ?>" name="<?php echo esc_attr($this->get_field_name('team-member-' . $i . '-name')); ?>" value="<?php echo $name?>">
                    </p>
                    <p>
                        <label class="widefat" for="<?php echo esc_attr($this->get_field_id('team-member-' . $i . '-image')); ?>"><?php echo __('Image', 'reign-light'); ?></label>
                        <a class="team-member-choose-image" href="#" data-target="<?php echo esc_attr($this->get_field_id('team-member-' . $i . '-image')); ?>">Choose Image</a>
                        <?php if(isset($image) && $image != ''): ?>
                            <img src="<?php echo $image ?>" alt="Image">
                        <?php endif; ?>
                        <input type="hidden" value="<?php echo $image; ?>" id="<?php echo esc_attr($this->get_field_id('team-member-' . $i . '-image')); ?>" name="<?php echo esc_attr($this->get_field_name('team-member-' . $i . '-image')); ?>">
                    </p>
                    <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-designation' ) ); ?>"><?php echo __('Designation', 'reign-light'); ?></label>
                        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-designation' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'team-member-' . $i . '-designation' ) ); ?>" value="<?php echo $designation; ?>">
                    </p>
                    <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-fb-url' ) ); ?>"><?php echo __('Facebook Url', 'reign-light'); ?></label>
                        <input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-fb-url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'team-member-' . $i . '-fb-url' ) ); ?>" value="<?php echo $fb_url; ?>">
                    </p>
                    <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-twitter-url' ) ); ?>"><?php echo __('Twitter Url', 'reign-light'); ?></label>
                        <input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-twitter-url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'team-member-' . $i . '-twitter-url' ) ); ?>" value="<?php echo $twitter_url; ?>">
                    </p>
                    <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-linkedin-url' ) ); ?>"><?php echo __('LinkedIn Url', 'reign-light'); ?></label>
                        <input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-linekedin-url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'team-member-' . $i . '-linkedin-url' ) ); ?>" value="<?php echo $linkedin_url; ?>">
                    </p>
                    <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-googleplus-url' ) ); ?>"><?php echo __('Google Plus Url', 'reign-light'); ?></label>
                        <input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'team-member-' . $i . '-googleplus-url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'team-member-' . $i . '-googleplus-url' ) ); ?>" value="<?php echo $googleplus_url; ?>">
                    </p>
                </div>
            <?php endfor; ?>
        <?php endif; ?>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $number_of_team_members = $instance['number_of_team_members'] = ( ! empty( $new_instance['number_of_team_members'] ) ? $new_instance['number_of_team_members'] : 0 );
        $instance['team_number_of_column'] = ( ! empty( $new_instance['team_number_of_column'] ) ? $new_instance['team_number_of_column'] : 3 );
        if($number_of_team_members > 0){
            for ($i = 1; $i <= $number_of_team_members; $i++){
                $instance['team-member-' . $i . '-name'] = ( ! empty( $new_instance['team-member-' . $i . '-name'] ) ? $new_instance['team-member-' . $i . '-name'] : __('Team Member - ' . $i, 'reign-light') );
                $instance['team-member-' . $i . '-image'] = ( ! empty( $new_instance['team-member-' . $i . '-image'] )  ? $new_instance['team-member-' . $i . '-image'] : '' );
                $instance['team-member-' . $i . '-designation'] = ( ! empty( $new_instance['team-member-' . $i . '-designation'] ) ? $new_instance['team-member-' . $i . '-designation'] : 'Team Member - ' . $i . '- Designation' );
                $instance['team-member-' . $i . '-fb-url'] = ( ! empty( $new_instance['team-member-' . $i . '-fb-url'] ) ? $new_instance['team-member-' . $i . '-fb-url'] : '' );
                $instance['team-member-' . $i . '-twitter-url'] = ( ! empty( $new_instance['team-member-' . $i . '-twitter-url'] ) ? $new_instance['team-member-' . $i . '-twitter-url'] : '' );
                $instance['team-member-' . $i . '-linkedin-url'] = ( ! empty( $new_instance['team-member-' . $i . '-linkedin-url'] ) ? $new_instance['team-member-' . $i . '-linkedin-url'] : '' );
                $instance['team-member-' . $i . '-googleplus-url'] = ( ! empty( $new_instance['team-member-' . $i . '-googleplus-url'] ) ? $new_instance['team-member-' . $i . '-googleplus-url'] : '' );
            }
        }
        return $instance;
    }
}

?>