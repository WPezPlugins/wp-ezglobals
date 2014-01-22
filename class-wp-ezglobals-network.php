<?php
/*
Plugin Name: WP ezGlobals
Plugin URI: https://github.com/WPezPlugins/wp-ezglobals
Description: A network / site (not theme) level set of classes that uses OOP inheritance to store key network and site options (read: properties *and methods*). These are read-only (i.e., safe from rouge code) via the ezGLOBALS() method.
Author: Mark Simchock for Alchemy United (AlchemyUnited.com)
Version: 0.5.0
Author URI: http://chiefalchemist.com?TODO
*/

/*
 * IMPORTANT
 * -- This is just an example. Actual properties and methods are up to you. 
 * -- Please follow the file and class naming convention.
 */

// No WP? Die! Now!!
if (!defined('ABSPATH')) {
	header( 'HTTP/1.0 403 Forbidden' );
    die();
}

/*
 * To make the instantiation a slight bit easier and more straightforward, the Class_WP_ezGlobals_Network and Class_WP_ezGlobals_Blog_ID_"x" 
 * are "wrapped", so to speak, in Class_WP_ezGlobals_Wrapper
 */
if ( !class_exists('Class_WP_ezGlobals_Wrapper')) {
	require_once('wrapper/class-wp-ezglobals-wrapper.php');
}

if ( !class_exists('Class_WP_ezGlobals_Network')) {
	class Class_WP_ezGlobals_Network extends Class_WP_ezClasses_Master_Singleton {
	
		protected $_str_faux_property_one;
		protected $_str_faux_property_two;
		protected $_str_faux_property_three;
		protected $_str_faux_property_four;
	
		
		/**
		 * Note: We're not using the construct
		 */
		protected function __construct(){} 
		
		
		public function ezc_init($arr_args = NULL){
		
			$this->_str_faux_property_one = 'foo';
			$this->_str_faux_property_two = 'bar';
			$this->_str_faux_property_three = $this->faux_method_a();
			$this->_str_faux_property_four = $this->faux_method_b();

		}
		
		/*
		 *
		 */
		protected function faux_method_a(){
			return 'return foo';
		}
		
		/*
		 *
		 */
		protected function faux_method_b(){
			return 'return bar';
		}
		
		
		/**
		 *
		 */
		public function ezGLOBALS($str_property){
		
			$str_property = trim($str_property);
			if ( property_exists($this, $str_property) && isset($this->$str_property) ){
				return $this->$str_property;
			} else {
				return NULL;
			}
		}
		
	} // close class
} // close if class_exists


/*
 * Notice how we init the wrapper and not Class_WP_ezGlobals_Network
 */
$obj_wp_ezglobals = Class_WP_ezGlobals_Wrapper::ezc_get_instance(get_current_blog_id());
?>