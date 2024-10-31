<?php
/*
Plugin Name: Samuweb Skim Blog
Plugin URI: http://samuweb.info/samuweb-skim-blog-wordpress-plugin
Description: An easy way to let users skim your pages quickly

Creates a button that auto-scrolls your page highlighting the titles and important things so they can decide if they want to read the article word by word.
Author: Samuel Nasta
Author URI: http://samuweb.info/
License: GPLv2 or later
Version: 1.0
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/



// Register Script
function samuweb_skim_blog_script() {
	wp_register_script('samuweb-skim-blog-script', plugins_url('/samuweb-skim-blog/samuweb-skim-blog.js'), array('jquery'), '1.0', true);
	wp_enqueue_script('samuweb-skim-blog-script');
}



// Register Style
function samuweb_skim_blog_style() {
	wp_register_style('samuweb-skim-blog-style', plugins_url('/samuweb-skim-blog/samuweb-skim-blog-style.css'), false, '1.0');
	wp_enqueue_style('samuweb-skim-blog-style');
}



function samuweb_skim_blog_admin_actions() {
	add_options_page('Settings for Samuweb Skim Blog', 'Samuweb Skim Blog', 'manage_options', 'samuweb-skim-blog-settings', 'samuweb_skim_blog_admin_page');
}


function samuweb_skim_blog_admin_page() {
	include('samuweb-skim-blog-admin.php');
}

function samuweb_skim_blog_header_config() {
?>
<script type="text/javascript">
var samuweb_skim_blog_scroll_speed = <?php echo get_option('samuweb_skim_blog_scroll_speed') ? get_option('samuweb_skim_blog_scroll_speed') : 2500; ?>;
var samuweb_skim_blog_primary_element = '<?php echo get_option('samuweb_skim_blog_primary_element') ?>';
var samuweb_skim_blog_secondary_element = '<?php echo get_option('samuweb_skim_blog_secondary_element') ?>';
</script>
<?php
}

function samuweb_skim_blog_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=samuweb-skim-blog-settings">Settings</a>';
  	array_unshift($links, $settings_link);
  	return $links;
}



function the_skim_button() {
	$samuweb_skim_blog_primary_element     = get_option('samuweb_skim_blog_primary_element');
	$samuweb_skim_blog_secondary_element   = get_option('samuweb_skim_blog_secondary_element');
	$samuweb_skim_blog_scroll_speed        = get_option('samuweb_skim_blog_scroll_speed');
	$samuweb_skim_blog_text                = get_option('samuweb_skim_blog_text');

	$the_skim_button   = '<div class="samuweb-skim-blog">';
	$the_skim_button  .= '<button class="samuweb-skim-blog-button">' . $samuweb_skim_blog_text . '</button>';
	$the_skim_button  .= '</div>';

    echo $the_skim_button;
}



add_action('admin_menu', 'samuweb_skim_blog_admin_actions');
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'samuweb_skim_blog_settings_link');
add_action('wp_enqueue_scripts', 'samuweb_skim_blog_script');
add_action('wp_enqueue_scripts', 'samuweb_skim_blog_style');
add_action('wp_head', 'samuweb_skim_blog_header_config');