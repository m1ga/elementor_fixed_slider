
<?php
/**
* Plugin Name: Elementor Fixed Slider
* Plugin URI: https://www.migaweb.de/
* Description: Slideshow with fixed background images
* Version: 1.0
* Author: Michael Gangolf
* Author URI: https://www.migaweb.de/
**/


add_action('wp_enqueue_scripts', 'enqueue_fixed_slider_style');

function enqueue_fixed_slider_style()
{
    wp_register_style('fixed_slider_styles', plugins_url('styles/main.css', __FILE__));
    wp_enqueue_style('fixed_slider_styles');
    wp_register_script('fixed_slider_script', plugins_url('scripts/main.js', __FILE__), '', '', true);
    wp_enqueue_script('fixed_slider_script');
}

use Elementor\Plugin;

add_action('init', static function () {
    require_once(__DIR__ . '/widget/fixed_slider.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Widget_Fixed_Slider());
});
