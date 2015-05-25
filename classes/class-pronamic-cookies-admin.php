<?php

class Pronamic_Cookies_Admin {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'plugins_loaded', array( $this, 'load_defaults' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
	}
	public function scripts() {
		wp_register_script( 'pronamic_cookie_admin_js', plugins_url( 'assets/pronamic-cookie-law-admin.js', PRONAMIC_CL_FILE ), array( 'jquery', 'wp-color-picker' ) );
		wp_enqueue_script( 'pronamic_cookie_admin_js' );
	}

	public function admin_menu() {
		add_submenu_page(
			'options-general.php',
			__( 'Pronamic Cookies for Demo Themes', 'pronamic-cookies' ),
			__( 'Pronamic Cookies for Demo Themes', 'pronamic-cookies' ),
			'manage_options',
			'pronamic_cookie_options_page',
			array( $this, 'display_options_page' )
		);
	}

	public function display_options_page() {
		pronamic_cookie_view( 'views/admin/display_options_page' );
	}

	public function load_defaults() {

		if ( get_option( 'pronamic_cookie_blocker_demo_text' ) === false ) {
		    update_option( 'pronamic_cookie_blocker_demo_text', __( 'Live Demo', 'pronamic-cookies' ) );
		}

		if ( get_option( 'pronamic_cookie_blocker_demo_buy_text' ) === false ) {
		    update_option( 'pronamic_cookie_blocker_demo_buy_text', __( 'Buy Now', 'pronamic-cookies' ) );
		}

		if ( get_option( 'pronamic_cookie_blocker_demo_banner_color' ) === false ) {
		    update_option( 'pronamic_cookie_blocker_demo_banner_color', '#88C55E' );
		}

		if ( get_option( 'pronamic_cookie_blocker_demo_banner_text' ) === false ) {
		    update_option( 'pronamic_cookie_blocker_demo_banner_text', __( 'We use third-party cookies to give you the best experience on our website. Navigating through this site you agree to our use of cookies', 'pronamic-cookies' ) );
		}

		if ( get_option( 'pronamic_cookie_blocker_demo_ok_text' ) === false ) {
		    update_option( 'pronamic_cookie_blocker_demo_ok_text', __( 'Ok', 'pronamic-cookies' ) );
		}

		if ( get_option( 'pronamic_cookie_blocker_demo_policy_text' ) === false ) {
		    update_option( 'pronamic_cookie_blocker_demo_policy_text', __( 'Read more', 'pronamic-cookies' ) );
		}

	}

	public function register_settings() {
		
		add_settings_section(
			'pronamic_cookie_options_advanced',
			__( 'Cookie Settings', 'pronamic-cookies' ),
			array( $this, 'settings_section' ),
			'pronamic_cookie_options_advanced_page'
		);
		
		add_settings_field(
			'pronamic_cookie_options_advanced_path',
			__( 'Path', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_advanced_page',
			'pronamic_cookie_options_advanced',
			array(
				'label_for' => 'pronamic_cookie_options_advanced_path'
			)
		);
		
		add_settings_field(
			'pronamic_cookie_options_advanced_expires',
			__( 'Expires', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_advanced_page',
			'pronamic_cookie_options_advanced',
			array(
				'label_for' => 'pronamic_cookie_options_advanced_expires',
				'description' => __( 'Use a string that would go in <a href="http://php.net/manual/en/function.strtotime.php">strtotime</a>', 'pronamic-cookies' ) 
			)
		);
		
		register_setting( 'pronamic_cookie_options_advanced', 'pronamic_cookie_options_advanced_path' );
		register_setting( 'pronamic_cookie_options_advanced', 'pronamic_cookie_options_advanced_expires' );

		// Blocker Settings
		add_settings_section(
			'pronamic_cookie_blocker_options',
			__( 'Landing page', 'pronamic-cookies' ),
			array( $this, 'settings_section' ),
			'pronamic_cookie_options_page'
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_active',
			__( 'Active?', 'pronamic-cookies' ),
			array( $this, 'select' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array(
				'label_for' => 'pronamic_cookie_blocker_demo_active',
				'options' => array(
					array(
						'label_for' => __( 'Yes', 'pronamic-cookies' ),
						'value'     => 1
					),
					array(
						'label_for' => __( 'No', 'pronamic-cookies' ),
						'value'     => 0
					)
				)
			)
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_img_logo',
			__( 'Image logo', 'pronamic-cookies' ),
			array( $this, 'uploader' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_img_logo', 'description' => __( 'Leave it empty if you wish to use Inline SVG', 'pronamic-cookies' ) )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_svg_logo',
			__( 'Inline SVG logo', 'pronamic-cookies' ),
			array( $this, 'textarea' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_svg_logo' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_logo_link',
			__( 'Logo link', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_logo_link' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_title',
			__( 'Title', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_title' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_subtitle',
			__( 'Subtitle', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_subtitle' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_image',
			__( 'Theme screenshot', 'pronamic-cookies' ),
			array( $this, 'uploader' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_image' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_text',
			__( 'Description', 'pronamic-cookies' ),
			array( $this, 'editor' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_text' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_text',
			__( 'Demo button text', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_text' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_link',
			__( 'Demo button link', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_link' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_buy_text',
			__( 'Buy button text', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_buy_text' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_buy_link',
			__( 'Buy button link', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_buy_link' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_banner_color',
			__( 'Banner background color', 'pronamic-cookies' ),
			array( $this, 'colorpicker' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_banner_color' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_banner_text',
			__( 'Banner text', 'pronamic-cookies' ),
			array( $this, 'textarea' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_banner_text' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_ok_text',
			__( 'OK button text', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_ok_text' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_policy_text',
			__( 'Policy button text', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_policy_text' )
		);

		add_settings_field(
			'pronamic_cookie_blocker_demo_policy_link',
			__( 'Policy link', 'pronamic-cookies' ),
			array( $this, 'text' ),
			'pronamic_cookie_options_page',
			'pronamic_cookie_blocker_options',
			array( 'label_for' => 'pronamic_cookie_blocker_demo_policy_link' )
		);

		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_img_logo' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_svg_logo' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_logo_link', array( $this, 'verifiy_url' ) );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_active' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_title' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_subtitle' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_image' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_text' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_text' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_link', array( $this, 'verifiy_url' ) );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_buy_text' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_buy_link', array( $this, 'verifiy_url' ) );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_banner_color' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_banner_text' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_ok_text' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_policy_text' );
		register_setting( 'pronamic_cookie_options', 'pronamic_cookie_blocker_demo_policy_link', array( $this, 'verifiy_url' ) );

	}

	public function settings_section() {}

	public function text( $args ) {
		printf(
			'<input name="%s" id="%s" type="text" value="%s" class="%s" />',
			esc_attr( $args['label_for'] ),
			esc_attr( $args['label_for'] ),
			esc_attr( get_option( $args['label_for'] ) ),
			'regular-text code'
		);
		
		if ( isset( $args['description'] ) ) {
			printf( 
				'<p class="description">%s</p>' ,
				$args['description']
			);
		}
	}

	public function select( $args ) {
		$chosen = get_option( $args['label_for'] );

		$html = "<select name='{$args['label_for']}'>";

		foreach ( $args['options'] as $option ) {
			if ( $chosen == $option['value'] ) {
				$html .= "<option value='{$option['value']}' selected='selected'>{$option['label_for']}</option>";
			}
			else {
				$html .= "<option value='{$option['value']}'>{$option['label_for']}</option>";
			}
		}

		$html .= '</select>';

		echo $html;

		if ( isset( $args['description'] ) ) {
			printf( 
				'<p class="description">%s</p>' ,
				$args['description']
			);
		}
	}

	public function textarea( $args ) {
		printf(
			'<textarea name="%s" id="%s" class="%s large-text" rows="3" cols="15">%s</textarea>',
			esc_attr( $args['label_for'] ),
			esc_attr( $args['label_for'] ),
			'regular-text code',
			esc_attr( get_option( $args['label_for'] ) )
		);

		if ( isset( $args['description'] ) ) {
			printf( 
				'<p class="description">%s</p>' ,
				$args['description']
			);
		}
	}

	public function editor( $args ) {
		wp_editor( get_option( $args['label_for'] ), $args['label_for'] );

		if ( isset( $args['description'] ) ) {
			printf( 
				'<p class="description">%s</p>' ,
				$args['description']
			);
		}
	}

	public function uploader( $args ) {
		wp_enqueue_media();

		$string = 	'<div class="uploader">' .
						'<input type="text" name="%s" id="%s" value="%s" class="widefat"/>' .
						'<input type="button" class="button button-secondary jMediaUploader" name="%s_button" id="%s_button" value="%s" />' .
					'</div>';

		printf(
			$string,
			esc_attr( $args['label_for'] ),
			esc_attr( $args['label_for'] ),
			get_option( $args['label_for'] ),
			esc_attr( $args['label_for'] ),
			esc_attr( $args['label_for'] ),
			__( 'Upload' )
		);

		if ( isset( $args['description'] ) ) {
			printf( 
				'<p class="description">%s</p>' ,
				$args['description']
			);
		}
	}

	public function colorpicker( $args ) {
		wp_enqueue_style( 'wp-color-picker' );

		printf(
			'<input type="text" class="jColorPicker" name="%s" value="%s"/>',
			esc_attr( $args['label_for'] ),
			get_option( $args['label_for'] )
		);

		if ( isset( $args['description'] ) ) {
			printf( 
				'<p class="description">%s</p>' ,
				$args['description']
			);
		}
	}

	public function verifiy_url( $raw_url ) {
		if ( empty( $raw_url) || 'http://' == $raw_url )
			return;

		$url = parse_url( $raw_url );

		if ( ! $url || ! isset( $url['scheme'] ) ) {
			$raw_url = 'http://' . $raw_url;
		}

		return filter_var( $raw_url, FILTER_VALIDATE_URL );
	}
}