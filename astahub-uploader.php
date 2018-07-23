<?php
/*
Plugin Name: Astahub - File Uploader
Plugin URI: https://github.com/astahub/astahub-uploader
Description: Simple WordPress media uploader using shortcode <code>[astahub_uploader input_name='file']</code>
Author: harisrozak
Author URI: https://github.com/harisrozak
Version: 0.1
Text Domain: astahub-uploader
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

// add_shortcode
add_shortcode('astahub_uploader', 'astahub_uploader_shortcode');
function astahub_uploader_shortcode( $attributes ) {
    wp_enqueue_media();    
    wp_register_script('astahub-uploader-js', plugin_dir_url( __FILE__ ) . 'media-uploader.js');
    wp_enqueue_script('astahub-uploader-js');

    $input_name = isset($attributes['input_name']) ? $attributes['input_name'] : "upload-file-id";

    $html = "<div id='astahub-file-uploader'>
        <span id='upload-label' style='line-height:28px;padding-right:5px'>
            No files selected
        </span>
        <a href='javascript:;'' id='upload-button' class='button'>Select a file</a>
        <input type='hidden' name='$input_name' id='upload-file-id'>             
    </div>";

    return $html; 
}