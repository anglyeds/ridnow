<?php
/*
Plugin Name: Progression One Click Import
Plugin URI: http://progressionstudios.com
Description: Importing Live Preview data
Author: Progression Studios
Version: 3.0
Author URI: http://progressionstudios.com
*/

/**
 * Version 0.0.3
 *
 * This file is just an example you can copy it to your theme and modify it to fit your own needs.
 * Watch the paths though.
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function my_enqueue() {
	 wp_register_style( 'demo_style', plugin_dir_url( __FILE__ ) . 'css/demo_style.css', false, '1.0.0' );
	 wp_enqueue_style( 'demo_style' );
    wp_enqueue_script( 'importdata', plugin_dir_url( __FILE__ ) . 'js/importdata.js' );
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {

	require_once( dirname( __FILE__ ) . '/importer/radium-importer.php' ); //load admin theme data importer

	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

		/**
		 * Holds a copy of the object for easy reference.
		 *
		 * @since 0.0.1
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Set name of the widgets json file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widgets_file_name       = 'widgets.json';

		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $content_demo_file_name  = 'content.xml';
		
		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $slider_file_name  = 'slider.zip';

		/**
		 * Holds a copy of the widget settings
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widget_import_results;

		/**
		 * Constructor. Hooks all interactions to initialize the class.
		 *
		 * @since 0.0.1
		 */
		public function __construct() {

			 $this->demo_files_path = dirname(__FILE__) . '/demo-files/'; //can
			 $this->theme_name1="progression-studios";
			$ddd = dirname(__FILE__) . '/demo-files/'; //can
			$files = array_diff(scandir($ddd), array('..', '.'));
			$this->theme_namess=$files;	
			//print_r($files);
			//die();
			self::$instance = $this;
			parent::__construct();

		}


	}

	new Radium_Theme_Demo_Data_Importer;

}
