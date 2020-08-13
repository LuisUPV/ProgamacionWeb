<?php
class DFFrameworkMetaboxes {

	public function __construct() {
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

	// Load backend scripts

	function admin_script_loader() {

	global $current_page;

		if (is_admin() && ( $current_page == 'post-new.php' || $current_page == 'post.php' )) {
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			wp_enqueue_style('color-picker', ADMIN_DIR . 'assets/css/colorpicker.css');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('color-picker', ADMIN_DIR .'assets/js/colorpicker.js', array('jquery'));
			wp_enqueue_script('meta-colorpicker', ADMIN_DIR .'assets/js/meta-color.js', array('jquery'));
		}

	}


	public function add_meta_boxes() {

		$this->add_meta_box('post_options', esc_html__( 'Post Options', 'rocket' ), 'post', 'normal', 'default');
		$this->add_meta_box('page_options', esc_html__( 'Page Options', 'rocket' ), 'page', 'normal', 'default');
		$this->add_meta_box('portfolio_options', esc_html__( 'Project Options', 'rocket' ), 'portfolio', 'normal', 'default');
		$this->add_meta_box('team_options', esc_html__( 'Team Member Options', 'rocket' ), 'team', 'normal', 'default');
		$this->add_meta_box('partners_options', esc_html__( 'Partners Options', 'rocket' ), 'partners', 'normal', 'default');
		$this->add_meta_box('woocommerce_options', esc_html__( 'Product Page Options', 'rocket' ), 'product', 'normal', 'default');

	}


	public function add_meta_box($id, $label, $post_type, $context, $priority) {

    add_meta_box(
			'rocket_' . $id,
			$label,
			array($this, $id),
			$post_type,
			$context,
			$priority
		);

	}


	public function save_meta_boxes($post_id) {

		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		foreach($_POST as $key => $value) {
			if(strstr($key, 'rocket_')) {
				update_post_meta($post_id, $key, $value);
			}
		}

	}


	public function post_options() {
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/post_options.php';
	}

	public function page_options() {
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/page_options.php';
	}

	public function portfolio_options() {
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/portfolio_options.php';
	}

	public function team_options() {
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/team_options.php';
	}

	public function partners_options() {
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/partners_options.php';
	}

	public function woocommerce_options() {
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/woocommerce_options.php';
	}


	public function text($id, $label, $desc = '') {

		global $post;

		$html = '';
		$html .= '<div class="rocket_metabox_field">';
			$html .= '<label for="rocket_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<input type="text" id="rocket_' . $id . '" name="rocket_' . $id . '" value="' . get_post_meta($post->ID, 'rocket_' . $id, true) . '" />';
				if($desc) {
					$html .= '<p style="margin-top:0.5em; margin-bottom:0.5em; color:#888;"><em>' . $desc . '</em></p>';
				}
			$html .= '</div>';
		$html .= '</div>';

		echo !empty( $html ) ? $html : '';

	}


	public function select($id, $label, $options, $desc = '') {

		global $post;

		$html = '';
		$html .= '<div class="rocket_metabox_field">';
			$html .= '<label for="rocket_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<select id="rocket_' . $id . '" name="rocket_' . $id . '">';

				if(isset($options) && is_array($options)) {
					foreach($options as $key => $option) {
						if(get_post_meta($post->ID, 'rocket_' . $id, true) == $key) {
							$selected = 'selected="selected"';
						} else {
							$selected = '';
						}
						$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
					}
				} else {
					$html .= '<option value="0">' . esc_html__('No options', 'rockets') . '</option>';
				}

				$html .= '</select>';
				if($desc) {
					$html .= '<p style="margin-top:0.5em; margin-bottom:0.5em; color:#888;"><em>' . $desc . '</em></p>';
				}
			$html .= '</div>';
		$html .= '</div>';

		echo !empty( $html ) ? $html : '';

	}


	public function textarea($id, $label, $desc = '') {

		global $post;

		$html = '';
		$html .= '<div class="rocket_metabox_field">';
			$html .= '<label for="rocket_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<textarea cols="120" rows="10" id="rocket_' . $id . '" name="rocket_' . $id . '">' . get_post_meta($post->ID, 'rocket_' . $id, true) . '</textarea>';
				if($desc) {
					$html .= '<p  style="margin-top:0.5em; margin-bottom:0.5em; color:#888;"><em>' . $desc . '</em></p>';
				}

			$html .= '</div>';
		$html .= '</div>';

		echo !empty( $html ) ? $html : '';

	}


	public function hide_sidebar() {
		global $post;
		$html = '<style>.us_box_ctn {display:none;}</style>';
		echo !empty( $html ) ? $html : '';
	}
}
$metaboxes = new DFFrameworkMetaboxes;
