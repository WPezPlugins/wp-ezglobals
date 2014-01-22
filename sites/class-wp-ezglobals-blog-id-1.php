<?php
/**
 * Class WP ezGlobals Blog ID "x" (global blog_id = TODO)
 *
 * IMPORTANT
 * -- This is just an example. Actual properties and methods are up to you. 
 * -- Please follow the file and class naming convention.
 */
 
// No WP? Die! Now!!
if (!defined('ABSPATH')) {
	header( 'HTTP/1.0 403 Forbidden' );
    die();
}

if ( !class_exists('Class_WP_ezGlobals_Blog_ID_1')) {
	class Class_WP_ezGlobals_Blog_ID_1 extends Class_WP_ezGlobals_Network {
	
			
		public function __construct($arr_args = NULL){
		
			parent::__construct();
		}	

			
		public function ezc_init(){
			/*
			 * Start with the parent
			 */
			parent::ezc_init();
			
			/*
			 * override properties here
			 */
			 
			// $this->_str_faux_property_one = 'foo 2';
		
		}
		
		/*
		protected function faux_method_a(){
			return 'return foo 2';
		}
		*/
		
		
		/**
		 * override methods here
		 */
			
			
	} // close class
} // close if class_exists

?>