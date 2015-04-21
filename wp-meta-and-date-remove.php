<?php
/*   Copyright 2015 Prasad Kirepkar

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

Plugin Name: WP Meta and date remover
Plugin URI: http://www.practicalprogrammers.net/wp-meta-remove-plugin
Description: WP Meta and date remover can removes Author name,Date and other information from pages and posts.Plugin works on every standard WP theme including 2011 to 2015. Plugin also includes simple guide which works for every non standard WP theme.   
Version: 1.0.0
Author: Prasad Kirepkar
Author URI: http://facebook.com/kirpekar1
License: GPL v2
*/
add_action('admin_menu','wp_aadr_admin_actions');
add_action('wp_head', 'remove_meta');

function wp_aadr_admin_actions() 
{
	add_options_page("Meta-remove guide", "Meta-remove guide", 1, "wp-meta-remove-guide","wp_aadr_admin" );
}
function wp_aadr_admin() 
{
	include('admin/wp_meta_remove_admin_page.php');
}
function remove_meta()
{ 	
	/* Register style css. */
	wp_enqueue_style( 'remove-meta', plugins_url( 'css/new-meta-style-sheet.css', __FILE__ ), false, '1.0', 'all' );
}

