<?php
/*
 * Plugin Name: Ready to Publish
 * Description: Add a little checkbox to ensure that you are ready to publish a post.
 * Author:      Jake Spurlock
 * Version:     0.5.0
*/

class Ready_to_Publish {
	/**
	 * The one instance of Ready_to_Publish.
	 *
	 * @var Ready_to_Publish
	 */
	private static $instance;

	/**
	 * Instantiate or return the one Ready_to_Publish instance.
	 *
	 * @return Ready_to_Publish
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initiate actions.
	 *
	 * @return Ready_to_Publish
	 */
	public function __construct() {
		$this->slug = apply_filters( 'ready_to_publish', 'ready-to-publish' );
		add_filter( 'post_submitbox_misc_actions', array( $this, 'submit_box_check_box' ) );
		add_action( 'admin_enqueue_scripts', array( $this,  'enqueueueue_js' ) );

	}

	/**
	 * Enqueue the Javascript
	 * @return void
	 */
	public function enqueueueue_js() {
		wp_enqueue_script( $this->slug, plugin_dir_url( __FILE__ ) . 'ready-to-publish.js', array( 'jquery' ) );
	}

	/**
	 * Add a checkbox to post_submitbox_misc_actions area that must be checked ahead of publishing a post.
	 * @return void
	 */
	public function submit_box_check_box() {
		global $post;
		if ( ! in_array( get_post_status( $post ), array( 'publish', 'future', ) ) ) {
			$ready_to_publish = esc_html__( apply_filters( 'ready_to_publish', 'Ready to Publish' ), 'ready-to-publish' );
			printf( "<div class='misc-pub-section'><label class='selectit ready_to_publish_label'><input type='checkbox' id='ready_to_publish' name='ready_to_publish'> %s</label></div>", $ready_to_publish );
		}
	}

}

/**
 * Instantiate or return the one Ready_to_Publish instance.
 *
 * @return Ready_to_Publish
 */
function ready_to_publish_instance() {
	return Ready_to_Publish::instance();
}

// Kick off the plugin on init
add_action( 'init', 'ready_to_publish_instance' );