<?php
/*
Plugin Name: Partner Link Widget
Version: 1.0
Plugin URI: https://www.thanhvv.com
Description: Partner link widget.
Author: Võ Văn Thành
Text Domain: partner-link
Domain Path: /translation
Author URI: https://www.thanhvv.com
*/

// Files
require_once ('files/widget.php');

// CSS file
add_action('wp_enqueue_scripts', 'partner_link_plugin_styles');
  function partner_link_plugin_styles() {
    wp_register_style('partner', plugins_url('sidebar-link-partner/css/custom.css'));
    wp_enqueue_style('partner');
  }

