<?php

//Alm change alt and title hook
add_filter(
    'wp_get_attachment_image_attributes',
    'alm_image_attributes',
    20,
    10
);
//adding ALM functionality
function alm_image_attributes( $attr, $attachment )
{
    // Get post parent
    $parent = get_post_field( 'post_parent', $attachment );
    // Get post type
    $type = get_post_field( 'post_type', $parent );
    // Get post title
    $title = get_post_field( 'post_title', $parent );
    //Get page ID
    $ID = get_the_ID();
    //check page type
    
    if ( is_page( $ID ) ) {
        $alm_page_alt = get_option( 'pages_images_alt' );
        $alm_page_title = get_option( 'pages_images_title' );
        
        if ( $alm_page_alt == 'Site Name' ) {
            $attr['alt'] = get_bloginfo( 'name' );
        } elseif ( $alm_page_alt == 'Page Title' ) {
            $attr['alt'] = get_the_title( $ID );
        }
        
        
        if ( $alm_page_title == 'Site Name' ) {
            $attr['title'] = get_bloginfo( 'name' );
        } elseif ( $alm_page_title == 'Page Title' ) {
            $attr['title'] = get_post_field( 'post_title', $parent );
        }
    
    }
    
    //check post type
    
    if ( is_single( $parent ) ) {
        $alm_post_alt = get_option( 'post_images_alt' );
        $alm_post_title = get_option( 'post_images_title' );
        
        if ( $alm_post_alt == 'Site Name' ) {
            $attr['alt'] = get_bloginfo( 'name' );
        } elseif ( $alm_post_alt == 'Post Title' ) {
            $attr['alt'] = get_post_field( 'post_title', $parent ) . $ID;
        }
        
        
        if ( $alm_post_title == 'Site Name' ) {
            $attr['title'] = get_bloginfo( 'name' );
        } elseif ( $alm_post_title == 'Post Title' ) {
            $attr['title'] = get_post_field( 'post_title', $parent );
        }
    
    }
    
    return $attr;
    return $attr;
}
