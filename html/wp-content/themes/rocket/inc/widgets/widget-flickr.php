<?php

class Flickr_Widget extends WP_Widget {

	function __construct() {

		$widget_ops = array(
			'classname' => 'widget_flickr',
			'description' => esc_html__('The most recent images from your Flickr account.', 'rocket')
		);

		$control_ops = array('id_base' => 'flickr-widget');

		parent::__construct( 'flickr-widget', 'Rocket - Flickr', $widget_ops, $control_ops );

	}

	function widget($args, $instance) {

		wp_enqueue_script('flickr-feed');

		extract($args);

		$title     = apply_filters('widget_title', $instance['title']);
		$flickr_id = apply_filters('flickr_id', $instance['flickr_id']);
		$btn_txt   = $instance['btn_txt'];
		$count     = $instance['count'];
		$suf       = rand(100000,999999);

		echo wp_kses( $before_widget, array(
			'aside' => array(
				'class' => array(),
				'id'    => array()
			),
		));

		if($title) {
			echo wp_kses_post( $before_title ) . esc_html( $title ) . wp_kses_post( $after_title );
		}
		?>

		<script>
			jQuery(document).ready(function() {
				jQuery('#flickr-<?php echo esc_js( $suf ); ?>').jflickrfeed({
					limit: <?php echo esc_js($count); ?>,
					qstrings: {
						id: '<?php echo esc_js($flickr_id); ?>'
					},
					itemTemplate: '<li><a href="{{link}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
				});
			});
		</script>
		<ul id="flickr-<?php echo esc_attr( $suf ); ?>" class="flickr-feed"></ul>

		<?php if ( $btn_txt ) : ?>
			<a href="https://www.flickr.com/photos/<?php echo esc_attr( $flickr_id ); ?>/" class="btn btn-primary btn-block" target="_blank"><?php echo esc_html( $btn_txt ); ?></a>
		<?php endif; ?>

		<?php

		echo wp_kses( $after_widget, array( 'aside' => array() ) );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = $new_instance['flickr_id'];
		$instance['btn_txt']   = $new_instance['btn_txt'];
		$instance['count'] = $new_instance['count'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
			'title' => esc_html__( 'Flickr', 'rocket' ),
			'flickr_id' => '52617155@N08',
			'btn_txt'   => '',
			'count' => 9
		);
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', 'rocket') ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		</p>
			<label for="<?php echo esc_attr($this->get_field_id('flickr_id') ); ?>"><?php esc_html_e('ID:', 'rocket') ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('flickr_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('flickr_id') ); ?>" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" />
		</p>

		</p>
			<label for="<?php echo esc_attr($this->get_field_id('count') ); ?>"><?php esc_html_e('Number of images:', 'rocket') ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count') ); ?>" value="<?php echo esc_attr( $instance['count'] ); ?>" />
		</p>

		</p>
			<label for="<?php echo esc_attr($this->get_field_id('btn_txt') ); ?>"><?php esc_html_e('Account Button Label:', 'rocket') ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('btn_txt') ); ?>" name="<?php echo esc_attr( $this->get_field_name('btn_txt') ); ?>" value="<?php echo esc_attr( $instance['btn_txt'] ); ?>" />
		</p>

	<?php
	}
}

register_widget('Flickr_Widget');
