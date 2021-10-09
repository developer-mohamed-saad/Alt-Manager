<?php

//Alm change alt and title hook
add_filter(
    'wp_get_attachment_image_attributes',
    'alm_image_attributes',
    PHP_INT_MAX,
    2
);
//adding ALM functionality
function alm_image_attributes( $attr, $attachment )
{
    // Get post parent
    $parent = get_post_field( 'post_parent', $attachment );
    // Get post type
    $type = get_post_field( 'post_type', $parent );
    //Get page or post ID
    $ID = get_the_ID();
    // options
    $options = [
        'Site Name'        => get_bloginfo( 'name' ),
        'Site Description' => get_bloginfo( 'description' ),
        'Page Title'       => get_the_title( $ID ),
        'Post Title'       => get_post_field( 'post_title', $ID ),
        'Product Title'    => get_post_field( 'post_title', $parent ),
    ];
    //wp image attachment data
    
    if ( wp_attachment_is_image( $attachment->ID ) ) {
        $options['Image Alt'] = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
        $options['Image Name'] = get_the_title( $attachment->ID );
        $options['Image Caption'] = $attachment->post_excerpt;
        $options['Image Description'] = $attachment->post_content;
    }
    
    //check page type
    
    if ( is_page( $ID ) ) {
        $alt = '';
        $title = '';
        //Page Images Alt
        
        if ( !empty(get_option( 'pages_images_alt' )) && is_array( get_option( 'pages_images_alt' ) ) ) {
            foreach ( get_option( 'pages_images_alt' ) as $option ) {
                
                if ( array_key_exists( $option, $options ) ) {
                    $alt .= $options[$option];
                } else {
                    $alt .= $option;
                }
            
            }
        } elseif ( !empty(get_option( 'pages_images_alt' )) && !is_array( get_option( 'pages_images_alt' ) ) ) {
            $alt = $options[get_option( 'pages_images_alt' )];
        }
        
        $attr['alt'] = $alt;
        //Page images title
        
        if ( !empty(get_option( 'pages_images_title' )) && is_array( get_option( 'pages_images_title' ) ) ) {
            foreach ( get_option( 'pages_images_title' ) as $option ) {
                
                if ( array_key_exists( $option, $options ) ) {
                    $title .= $options[$option];
                } else {
                    $title .= $option;
                }
            
            }
        } elseif ( !empty(get_option( 'pages_images_title' )) && !is_array( get_option( 'pages_images_title' ) ) ) {
            $title = $options[get_option( 'pages_images_title' )];
        }
        
        $attr['title'] = $title;
    }
    
    //check homepage
    
    if ( is_front_page( $ID ) ) {
        $alt = '';
        $title = '';
        //Homepage Images Alt
        
        if ( !empty(get_option( 'home_images_alt' )) && is_array( get_option( 'home_images_alt' ) ) ) {
            foreach ( get_option( 'home_images_alt' ) as $option ) {
                
                if ( array_key_exists( $option, $options ) ) {
                    $alt .= $options[$option];
                    // var_dump($options[$option]);
                } else {
                    $alt .= $option;
                }
            
            }
        } elseif ( !empty(get_option( 'home_images_alt' )) && !is_array( get_option( 'home_images_alt' ) ) ) {
            $alt = $options[get_option( 'home_images_alt' )];
        }
        
        $attr['alt'] = $alt;
        //Homepage images title
        
        if ( !empty(get_option( 'home_images_title' )) && is_array( get_option( 'home_images_title' ) ) ) {
            foreach ( get_option( 'home_images_title' ) as $option ) {
                
                if ( array_key_exists( $option, $options ) ) {
                    $title .= $options[$option];
                } else {
                    $title .= $option;
                }
            
            }
        } elseif ( !empty(get_option( 'home_images_title' )) && !is_array( get_option( 'home_images_title' ) ) ) {
            $title = $options[get_option( 'home_images_title' )];
        }
        
        $attr['title'] = $title;
    }
    
    //check post type
    
    if ( $type != 'product' && is_single( $ID ) || $type == 'post' ) {
        $alt = '';
        $title = '';
        // var_dump(get_option('post_images_alt'));
        //Posts Images Alt
        
        if ( !empty(get_option( 'post_images_alt' )) && is_array( get_option( 'post_images_alt' ) ) ) {
            foreach ( get_option( 'post_images_alt' ) as $option ) {
                
                if ( array_key_exists( $option, $options ) ) {
                    $alt .= $options[$option];
                } else {
                    $alt .= $option;
                }
            
            }
        } elseif ( !empty(get_option( 'post_images_alt' )) && !is_array( get_option( 'post_images_alt' ) ) ) {
            $alt = $options[get_option( 'post_images_alt' )];
        }
        
        $attr['alt'] = $alt;
        //Posts images title
        
        if ( !empty(get_option( 'post_images_title' )) && is_array( get_option( 'post_images_title' ) ) ) {
            foreach ( get_option( 'post_images_title' ) as $option ) {
                
                if ( array_key_exists( $option, $options ) ) {
                    $title .= $options[$option];
                } else {
                    $title .= $option;
                }
            
            }
        } elseif ( !empty(get_option( 'post_images_title' )) && !is_array( get_option( 'post_images_title' ) ) ) {
            $title = $options[get_option( 'post_images_title' )];
        }
        
        $attr['title'] = $title;
    }
    
    // else{
    // $attr['alt']= get_bloginfo('name');
    // $attr['title']= get_bloginfo('name');
    //         return $attr;
    //     }
    // $attr['alt']= get_bloginfo('name');
    // $attr['title']= get_bloginfo('name');
    // $attri= array(
    //     'alt'=>'test'
    // );
    // wp_get_attachment_image( $attachment, '', false,  $attri);
    // $attr['alt']= get_bloginfo('name');
    // $attr['title']= get_bloginfo('name');
    // $test = get_image_tag( $attachment , 'test', 'test', 'center');
    // $attr['alt']= $type.'-'. $ID ;
    // $attr['title']= $type.'-'. $ID ;
    // var_dump(attachment_image_data('image_name'));
    // $attr['alt']= 'test';
    return $attr;
}
