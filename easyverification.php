<?php
/*
Plugin Name: Easy Verification
Plugin URI: http://www.allancollins.net/80/easy-verification/
Description: This plugin will allow you to easily verify your site for Google, Bing and Yahoo!.
Author: Allan Collins
Version: 1.3
Author URI: http://www.allancollins.net
*/
/*
Copyright (C) 2008 Allan Collins

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
// Hook for adding admin menus
add_action('admin_menu', 'easyv_add_pages');

// action function for above hook
function easyv_add_pages() {
    add_options_page('Easy Verification', 'Easy Verification', 8, 'easyverification', 'easyv_options');
}

function easyv_options() {
    echo "<div style=\"margin-left:200px; \">";
    echo "<h2>Easy Verification</h2>";
    echo "Enter the verification keys (content parameter of META tag) for Google Webmaster Tools, Bing Webmaster Tools and Yahoo! Site Explorer.<br/><br/>";
    echo '<form method="post" action="options.php">';
    wp_nonce_field('update-options');
    echo 'Example: &lt;meta name="verify-v1" content="<b>URPaftUcC5k1lmSXeVBn3JpqyPJIMXDhPomojAIOhWE=</b>" /&gt;<br/><br/>';
    echo 'Google: <input type="text" name="easyv_google" value="' . get_option('easyv_google') . '" /><br/><br/>';
    echo 'Example: &lt;META name="y_key" content="<b>5ea13d6e265bbf4c</b>" &gt;<br/><br/>';
    echo 'Yahoo!: <input type="text" name="easyv_yahoo" value="' . get_option('easyv_yahoo') . '" /><br/><br/>';
    echo 'Example: &lt;META name="msvalidate.01" content="<b>5ea13d6e265bbf4c</b>" &gt;<br/><br/>';
    echo 'Bing: <input type="text" name="easyv_bing" value="' . get_option('easyv_bing') . '" /><br/><br/>';
    echo '<input type="hidden" name="action" value="update" />';
    echo '<input type="hidden" name="page_options" value="easyv_google,easyv_yahoo,easyv_bing" />';
    echo '<p class="submit">
<input type="submit" name="Submit" value="Save Changes" />
</p>';
    echo "</div>";
}

add_action('wp_head', 'easyv_add_meta');


function easyv_add_meta() {

    echo "<!-- Easy Verification -->\n";
    echo '<meta name="verify-v1" content="'. get_option('easyv_google') . '" />';
    echo '<meta name="google-site-verification" content="'. get_option('easyv_google') . '" />';
    echo '<meta name="y_key" content="'. get_option('easyv_yahoo') . '" />';
    echo '<meta name="msvalidate.01" content="'. get_option('easyv_bing') . '" />';
    echo "<!-- End Easy Verification -->\n";


}



?>