<?php

/**
 * @package ALM
 * @author Mohamed Saad
 * @link https://wpsaad.com
 * @since 1.0.0
 */
/**
 * Plugin Name: Alt Manager
 * plugin URI: https://wpsaad.com/alt-manager-wordpress-image-alt-text-plugin
 * Description: Alt Manager bulk generate and change images Alt and Title attributes for WordPress images and fix empty values to a dynamic related values.
 * Version: 1.4.5
 * Author: Mohamed Saad
 * Author URI: https://wpsaad.com
 * License: GPLv2 or later
 * Text Domain: alt-manager
 * Domain Path: /languages
 */
defined( 'ABSPATH' ) or die;

if ( function_exists( 'am_fs' ) ) {
    am_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'am_fs' ) ) {
        // Create a helper function for easy SDK access.
        function am_fs()
        {
            global  $am_fs ;
            
            if ( !isset( $am_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $am_fs = fs_dynamic_init( array(
                    'id'             => '5548',
                    'slug'           => 'alt-manager',
                    'type'           => 'plugin',
                    'navigation'     => 'tabs',
                    'public_key'     => 'pk_07c4f76da780308f88546ce3da78a',
                    'is_premium'     => false,
                    'premium_suffix' => 'premium plan',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug'   => 'alt-manager',
                    'parent' => array(
                    'slug' => 'options-general.php',
                ),
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $am_fs;
        }
        
        // Init Freemius.
        am_fs();
        // Signal that SDK was initiated.
        do_action( 'am_fs_loaded' );
    }
    
    //add style
    add_action( 'admin_enqueue_scripts', 'alm_style' );
    function alm_style()
    {
        wp_enqueue_script( 'select2-script', plugins_url( '/assets/js/select2.min.js', __FILE__ ) );
        wp_enqueue_style( 'select2-style', plugins_url( '/assets/css/select2.min.css', __FILE__ ) );
        wp_enqueue_script( 'alm-admin-script', plugins_url( '/assets/js/alm-admin-script.js', __FILE__ ) );
        wp_enqueue_style( 'alm-admin-style', plugins_url( '/assets/css/alm-admin-styles.css', __FILE__ ) );
        if ( is_rtl() ) {
            wp_enqueue_style( 'alm-admin-style-rtl', plugins_url( '/assets/css/alm-admin-styles-rtl.css', __FILE__ ) );
        }
        // wp_enqueue_script('jquery-ui-sortable');
    }
    
    //load plugin required files
    add_action( 'init', 'alm_load' );
    function alm_load()
    {
        $current_user = wp_get_current_user();
        require_once plugin_dir_path( __FILE__ ) . 'inc/alm-functions.php';
        require_once plugin_dir_path( __FILE__ ) . 'inc/alm-empty-generator.php';
        require_once plugin_dir_path( __FILE__ ) . 'inc/alm-activate.php';
        register_activation_hook( __FILE__, array( 'almActivate', 'activate' ) );
        if ( user_can( $current_user, 'manage_options' ) ) {
            include_once plugin_dir_path( __FILE__ ) . 'inc/alm-admin.php';
        }
        if ( !function_exists( 'file_get_html' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'inc/simple_html_dom.php';
        }
    }

}
