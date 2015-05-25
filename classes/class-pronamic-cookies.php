<?php

class Pronamic_Cookies {
	public $plugin_file;

	public $spiders = array(
		'Googlebot', 'Yammybot', 'Openbot',
		'Yahoo', 'Slurp', 'manbot', 'ia_archiver',
		'Lycos', 'Scooter', 'AltaVista', 'Teoma',
		'Gigabot', 'Googlebot-Mobile'
	);

	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'template_redirect', array( $this, 'blocker' ) );

	}

	public function init() {
		load_plugin_textdomain( 'pronamic-cookies', false, PRONAMIC_CL_PLUGIN_DIR . '/languages/' );
	}

	public function scripts() {
		wp_register_script( 'pronamic_cookie_js', plugins_url( PRONAMIC_CL_PLUGIN_DIR . '/assets/pronamic-cookie-law.js' ), array( 'jquery' ) );
		wp_enqueue_script( 'pronamic_cookie_js' );
		
		$setting_expire = get_option( 'pronamic_cookie_options_advanced_expires', '1 year' );
		
		if ( empty( $setting_expire ) )
			$setting_expire = '1 year';
		
		$setting_path = get_option( 'pronamic_cookie_options_advanced_path', '/' );
		
		if ( empty( $setting_path ) )
			$setting_path = '/';
		
		$expires_date = new DateTime( $setting_expire, new DateTimeZone( 'GMT' ) );
		
		wp_localize_script( 'pronamic_cookie_js', 'Pronamic_Cookies_Vars', array(
			'cookie' => array(
				'path'    => $setting_path,
				'expires' => $expires_date->format( 'D, d M Y H:i:s e' )
			)
		) );
	}

	public function blocker() {
		$blocker_active = get_option( 'pronamic_cookie_blocker_demo_active' );

		if ( $blocker_active == 1 && ! $this->is_a_spider() && ! isset( $_COOKIE['cookie_notice_accepted'] ) ) {
			// intercept!
			pronamic_cookie_view( 'views/blocker', array(
				'javascript_url'       => plugins_url( 'assets/pronamic-cookie-law.js', PRONAMIC_CL_FILE ),
				'img_logo'             => get_option( 'pronamic_cookie_blocker_demo_img_logo' ),
				'svg_logo'             => get_option( 'pronamic_cookie_blocker_demo_svg_logo' ),
				'logo_link'            => get_option( 'pronamic_cookie_blocker_demo_logo_link' ),
				'title'                => get_option( 'pronamic_cookie_blocker_demo_title' ),
				'subtitle'             => get_option( 'pronamic_cookie_blocker_demo_subtitle' ),
				'image'                => get_option( 'pronamic_cookie_blocker_demo_image' ),
				'text'                 => get_option( 'pronamic_cookie_blocker_demo_text' ),
				'demo_text'            => get_option( 'pronamic_cookie_blocker_demo_demo_text' ),
				'demo_link'            => get_option( 'pronamic_cookie_blocker_demo_demo_link' ),
				'buy_text'             => get_option( 'pronamic_cookie_blocker_demo_buy_text' ),
				'buy_link'             => get_option( 'pronamic_cookie_blocker_demo_buy_link' ),
				'banner_color'         => get_option( 'pronamic_cookie_blocker_demo_banner_color' ),
				'banner_text'          => get_option( 'pronamic_cookie_blocker_demo_banner_text' ),	
				'ok_text'              => get_option( 'pronamic_cookie_blocker_demo_ok_text' ),
				'policy_text'          => get_option( 'pronamic_cookie_blocker_demo_policy_text' ),
				'policy_link'          => get_option( 'pronamic_cookie_blocker_demo_policy_link' ),		
			) );

			exit;
		}
	}

	public function is_a_spider() {
		return array_search( $_SERVER['HTTP_USER_AGENT'], $this->spiders ) !== false;
	}
}