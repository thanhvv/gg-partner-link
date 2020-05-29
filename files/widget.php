<?php
/**
 * Adds PartnerLinkWidget widget.
 */

class PartnerLinkWidget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct('Partner_Link_Widget',

        // Base ID
        __('Partner Link', 'partner-link'),

        // Name
        array('description' => __('List Partner Link', 'partner-link'),)

        // Args
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
    public function widget($args, $instance) {
        global $post;
        $title = $instance['title'];
        $link = $instance['link'];

        echo $args['before_widget'];
        
        $htmlContent =
        '<div class="link-website-container">
          <a href="'.$link.'" target="_blank">
            <p class="link-website">'.$title.'</p>
          </a>
        </div>';
        echo $htmlContent;

        echo $args['after_widget'];
    }

  /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['link'] = sanitize_text_field( $new_instance['link'] );
        return $instance;
    }

    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $link = isset( $instance['link'] ) ? esc_attr( $instance['link'] ) : '';
?>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'wp_widget_plugin' ); ?></label><br />
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php _e( 'Link', 'wp_widget_plugin' ); ?></label><br />
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
</p>

        <?php
    }
}

// register PartnerLinkWidget widget
function RegisterPartnerLinkWidget() {
    register_sidebar( array(
        'name'          => 'Right Sidebar',
        'id'            => 'sidebar-partner-link',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );
    register_widget('PartnerLinkWidget');
}
add_action('widgets_init', 'RegisterPartnerLinkWidget');
