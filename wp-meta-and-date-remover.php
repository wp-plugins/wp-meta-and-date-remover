<?php
/*
Plugin Name: WP Meta and date remover
Plugin URI: http://www.practicalprogrammers.net/wp-meta-remove-plugin
Description: WP meta and date remover is capable to remove meta and date information from posts and pages. Plugin works on every standard,free,premium,bootstrap based wordpress theme. plugin uses two methods to remove meta data, which means it support almost all themes.You also can follow <a href="">my genuine guide</a>.Guide works for every theme.  
Version: 1.1.0
Author: Prasad Kirepkar
Author URI: http://facebook.com/kirpekar1
License: GPL v2
Copyright: Prasad Kirepkar

	This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function extra_links($links){
$guide_link = '<a href="http://practicalprogrammers.net/wordpress-meta-removal-guide/">Guide to remove meta</a>';
  array_unshift($links, $guide_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);

//Removal using css
function remove_meta_css()
{ 	
	/* Register style css. */
	wp_enqueue_style( 'remove-meta', plugins_url( 'css/new-meta-style-sheet.css', __FILE__ ), false, '1.0', 'all' );
}

// removal using php.
//some times css removal don't work for every theme.
function remove_meta_php() {
add_filter('the_date', '__return_false');
add_filter('the_author', '__return_false');
add_filter('the_time', '__return_false');
add_filter('the_modified_date', '__return_false');
add_filter('get_the_date', '__return_false');
add_filter('get_the_author', '__return_false');
add_filter('get_the_title', '__return_false');
add_filter('get_the_time', '__return_false');
add_filter('get_the_modified_date', '__return_false');
} 

//do everything 
add_action('wp_head', 'remove_meta_css');
add_filter("plugin_action_links_$plugin", 'extra_links' );
add_action('loop_start', 'remove_meta_php');
