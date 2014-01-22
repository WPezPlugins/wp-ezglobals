<?php
/*
 * This "wrapper" does the majority of the dirty work for WP ezGlobals.
 */


// No WP? Die! Now!!
if (!defined('ABSPATH')) {
	header( 'HTTP/1.0 403 Forbidden' );
    die();
}

if ( !class_exists('Class_WP_ezGlobals_Wrapper')) {

	class Class_WP_ezGlobals_Wrapper extends Class_WP_ezClasses_Master_Singleton{
	
		/**
		 * Note: We're not using the construct
		 */
		protected function __construct(){
			parent::__construct();
		}
		
		/*
		 * Not using this either
		 */
		public function ezc_init(){}  	
		
		public static function ezc_get_instance($int_blog_id = NULL) {
		
			parent::ezc_get_instance();
			
			$arr_defaults = self::ezglobals_defaults();
			
			if ( is_multisite() ) {
			
				// Do we want an instance for a particular blog_id? Let's make sure it's legit. When in doubt get_current_blog_id()
				if ( ! isset($int_blog_id) || ( isset($int_blog_id) && ! is_int($int_blog_id) ) || (get_blog_details($int_blog_id) == false) ) {
					$int_blog_id = get_current_blog_id();
				}
			
			} else {
			
				// Do we want an instance for a particular blog_id? Let's make sure it's legit. When in doubt get_current_blog_id()
				if ( ! isset($int_blog_id) || ( isset($int_blog_id) && ! is_int($int_blog_id) ) ) {
					$int_blog_id = get_current_blog_id();
				}
			
			}
			
			$int_blog_id = trim($int_blog_id);
			
			$str_new_site_slug_file = trim($arr_defaults['slug_file']) . $int_blog_id;
			$str_new_site_slug_class_name = trim($arr_defaults['slug_class_name']) . $int_blog_id;
			
			/*
			 *
			 */
			if ( ! class_exists($str_new_site_slug_class_name) ){
	
				$str_parent_dir = dirname(dirname(__FILE__));
				$str_sites_folder = trim($arr_defaults['sites_folder']);
				
				// if we have a site-centric (read: blog_id) /sites/ class then use it, else we default to the network class.
				if( @file_exists( $str_parent_dir . '/' . $str_sites_folder . '/' . $str_new_site_slug_file . '.php') ) {
				
					require_once (  $str_parent_dir . '/' . $str_sites_folder . '/' . $str_new_site_slug_file . '.php');		
					$obj_ez_globals = $str_new_site_slug_class_name::ezc_get_instance();
					
				} else {
			
					$str_network_class_name = trim($arr_defaults['network_class_name']); 
					$obj_ez_globals = $str_network_class_name::ezc_get_instance();
				}
			} else {
				$obj_ez_globals = $str_new_site_slug_class_name::ezc_get_instance();	
			}
			return $obj_ez_globals;
		}
		
		/*
		 * 
		 */
		protected function ezglobals_defaults(){
		
			$arr_defaults = array(
								'sites_folder'			=> 'sites',
								'network_class_name'	=> 'Class_WP_ezGlobals_Network',
								'slug_file'				=> 'class-wp-ezglobals-blog-id-',
								'slug_class_name'		=> 'Class_WP_ezGlobals_Blog_ID_',
							);
		
			return $arr_defaults;
		}
	
	}
}
?>