<?php

/**
 * Plugin name: XTMConnect
 * Plugin URI: GITHUB REPOOOO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Version: 1.1.0
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Author: AT
 * License GPL v2 or later
 */

if(! defined('ABSPATH')){
    die;
}

if(class_exists('XTMConnect')){
$XTMConnect = new XTMconnect();
$XTMConnect->register();
}
//activation
register_activation_hook(__FILE__, array($XTMConnect,'activate'));
//deactivation
register_deactivation_hook(__FILE__, array($XTMConnect,'deactivate'));


 class XTMConnect{
     public $plugin;
     function __construct(){
         $this->plugin =plugin_basename(__FILE__);

         //add_action('init', array($this, 'custom_post_type'));
     }
     function register(){
         add_action('admin_enqueue_scripts', array($this, 'enqueue'));
         add_action('admin_menu', array($this, 'add_admin_pages'));
        
         add_filter("plugin_action_link_$this->plugin", array($this, 'settings_link'));
     }

	
     function settings_link($links){
         //add custom settings
         echo $links;
     }

     

     function add_admin_pages(){
        add_menu_page('XTMConnect','XTMConnect', 'manage_options','XTM_plugin', array($this, 'admin_index'), 'dashicons-admin-site-alt3', 110);
        add_submenu_page( 'XTM_plugin',  'Translation' , 'translation' , 'manage_options', 'XTM_plugin_transtation', array($this, 'to_translate'), 10);
    }
    function admin_index(){
        require_once plugin_dir_path(__FILE__) . 'admino.php';
    }
    function to_translate(){
        require_once plugin_dir_path(__FILE__) . 'translations.php';
    }
   
    function enqueue(){
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }

    function activate(){
        $this->custom_post_type();
        flush_rewrite_rules();

    }
    function deactivate(){
        flush_rewrite_rules();

    }
   
    //unnecessary
    function custom_post_type(){
        register_post_type('content', ['public'=>true, 'label'=>'unprocessed content']);
    }



	//protected static $instance = null;

 
/*
    public function __construct() {
		add_action('admin_menu', array($this, '__construct()'));
        // manages plugin activation and deactivation.
		register_activation_hook( __FILE__, array( &$this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );

		$action = filter_input( INPUT_GET, 'action' );
		$plugin = filter_input( INPUT_GET, 'plugin' );

		// stopping here if we are going to deactivate the plugin (avoids breaking rewrite rules).
		if ( ! empty( $action ) && ! empty( $plugin ) && 'deactivate' === $action && plugin_basename( __FILE__ ) === $plugin ) {
			return;
		}

		$action = isset( $action ) ? $action : filter_input( INPUT_POST, 'action' );
		// loads the admin side of Polylang for the dashboard.
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $action ) && 'lingotek_language' === $action ) {
			define( 'PLL_AJAX_ON_FRONT', false );
			
			add_filter( 'pll_model', array( &$this, 'PLL_Admin_Model' ) );
		}

		spl_autoload_register( array( &$this, 'autoload' ) ); // autoload classes.

		// init.
		add_filter( 'pll_model', array( &$this, 'pll_model' ) );
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'admin_init', array( &$this, 'admin_init' ) );

		// add Lingotek locale to languages.
		add_filter( 'pll_languages_list', array( &$this, 'pre_set_languages_list' ) );

		// flag title.
		add_filter( 'pll_flag_title', array( &$this, 'pll_flag_title' ), 10, 3 );

		// adds a pointer upon plugin activation to draw attention to Lingotek.
		if ( ! get_option( 'lingotek_token' ) ) {
			add_action( 'init', array( &$this, 'lingotek_activation_pointer' ) );
		}
		add_action( 'init', array( &$this, 'lingotek_professional_translation_pointer' ) );


		add_action( 'plugins_loaded', array( &$this, 'lingotek_plugin_migration' ) );
	}

    public function init() {
		if ( ! defined( 'POLYLANG_VERSION' ) ) {
			return;
		}

		add_rewrite_rule( 'lingotek/?$', 'index.php?lingotek=1&$matches[1]', 'top' );

		if ( is_admin() ) {
			new Lingotek_Admin();
		}

		// admin side.
		if ( PLL_ADMIN && ! PLL_SETTINGS ) {
			$this->model = new Lingotek_Model();
			// overrides Polylang classes.
			$classes = array( 'Filters_Post', 'Filters_Term', 'Filters_Media', 'Filters_Columns' );
			foreach ( $classes as $class ) {
				$method = "Lingotek_$class";

				add_filter( 'pll_' . strtolower( $class ) , array( &$this, $method ));
			}

			// add actions to posts, media and terms list.
			// no need to load this if there is no language yet.
			if ( $GLOBALS['polylang']->model->get_languages_list() ) {
				$this->post_actions = new Lingotek_Post_Actions();
				$this->term_actions = new Lingotek_Term_Actions();
				$this->string_actions = new Lingotek_String_actions();
				new Lingotek_Workflow_Factory(); // autoloads class.
			}

			$this->utilities = new Lingotek_Utilities();
		} // callback.
		elseif ( ! PLL_ADMIN && ! PLL_AJAX_ON_FRONT ) {
			$GLOBALS['wp']->add_query_var( 'lingotek' );

			$this->model = new Lingotek_Model();
			$this->callback = new Lingotek_Callback( $this->model );
		}
	}


     public static function get_instance() {

    // If the single instance hasn't been set, set it now.
    if ( null === self::$instance ) {
        self::$instance = new self;
    }

    return self::$instance;
    }*/
 
}