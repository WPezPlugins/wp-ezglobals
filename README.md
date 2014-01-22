WP ezGlobals
============

A network / site (not theme) level set of classes that uses OOP inheritance to store key network and site options (read: properties *and methods*). These are read-only (i.e., safe from rouge code) via the ezGLOBALS() method.

Note: Aside from properties and methods, WP's actions and filters are also available. 

Using WP WP ezGlobals
=====================

1) It is recommend that you use this plugin via the WP ezMU-Plugins plugin (https://github.com/WPezPlugins/wp-ezmu-plugins). If you load WP ezGlobals *after* WP ezClasses you will have access to the magic in WP ezClasses. 

2) Here's a basic example of init'ing Class_WP_ezGlobals_Wrapper and then using the ezGLOBALS method to get the value of a property.

<?
$obj_wp_ezglobals = Class_WP_ezGlobals_Wrapper::ezc_get_instance(get_current_blog_id());
echo $obj_wp_ezglobals->ezGLOBALS('_str_faux_property_three');
?>

For demo purposes, add this snippet to your header or footer.

3) The echo should spit out: return foo

4) Now in the /sites/ folder open the file: class-wp-ezglobals-blog-id-1.php. Remove the commenting from the method(): faux_method_a().

5) Back to the front end. Refresn the page. The echo should spit out: return foo 2


Why WP ezGlobals?
=================

1) Traditional PHP GLOBALS are subject to abuse. With WP ezGlobals you are able to define values and keep them protected from rouge code and accident.

2) Along the same lines, WP options are also loosely protected. If you have setting / values that rarely change and you want to keep them out of harm's way then WP ezGlobals is ideal. 

3) Example: Let's say you have a WP multisite network that uses five different custom themes for 20+ sites. Let's say each site has your logo in the footer. With WP ezGlobals you can define the src / URI for the logo image and then use that property across all your themes. If the logo changes you only have to make the change in one spot. 

Or perhaps you have API credentials (or affiliate credentials) that all the sites share. Again, if for some reason those credentials change, you only have to make a single update in a single spot. 

4) That said, you can override properties and methods on a site by site basis. 

5) Once you start using WP ezClasses you'll have acesss to some if it's magic. For example, if you always want to remove the default admin meta boxes you'd be able make that happen in WP ezGlobals "automatically". 

6) Agreed, relative to traditional WP this concept is somewhat foreign (read: innovative). However, if you're doing custom WordPress dev with WP as a framework then please consider leaning on WP ezGlobals. 