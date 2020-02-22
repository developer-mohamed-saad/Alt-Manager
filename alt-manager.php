<?php

/**
 * @package ALM
 * @author Mohamed Saad
 * @link https://mohamed-saad.000webhostapp.com/
 * @since 1.0.0
 */
/**
 * Plugin Name: Alt Manager
 * plugin URI: webdevelopersaad.com/plugin
 * Description: This Plugin Manages alt attribes for WordPress images
 * Version: 1.0.0
 * Author: Mohamed Saad
 * Author URI: webdevelopersaad.com
 * License: GPLv2 or later
 * Text Domain: ALM
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
        wp_enqueue_style( 'alm-admin-style', plugins_url( '/assets/alm-admin-styles.css', __FILE__ ) );
    }
    
    //load plugin required files
    add_action( 'init', 'alm_load' );
    function alm_load()
    {
        $current_user = wp_get_current_user();
        
        if ( user_can( $current_user, 'manage_options' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'inc/alm-functions.php';
            require_once plugin_dir_path( __FILE__ ) . 'inc/alm-activate.php';
            register_activation_hook( __FILE__, array( 'almActivate', 'activate' ) );
            include_once plugin_dir_path( __FILE__ ) . 'inc/alm-admin.php';
        }
    
    }

}
