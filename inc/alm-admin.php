<?php

add_action( 'admin_init', 'alm_settings' );
function alm_settings()
{
    register_setting( 'alm_settings', 'home_images_alt' );
    register_setting( 'alm_settings', 'home_images_title' );
    register_setting( 'alm_settings', 'pages_images_alt' );
    register_setting( 'alm_settings', 'pages_images_title' );
    register_setting( 'alm_settings', 'post_images_alt' );
    register_setting( 'alm_settings', 'post_images_title' );
}

add_action( 'admin_menu', 'alm_setting' );
function alm_setting()
{
    add_options_page(
        'Alt Manager Settings',
        'Alt Manager',
        'manage_options',
        'alt-manager',
        'alm_settings_admin'
    );
}

function alm_settings_admin()
{
    $alm_home_options = array(
        'Page Title'        => [
        'value' => 'Page Title',
        'text'  => __( 'Page Title', 'alt-manager' ),
    ],
        'Site Name'         => [
        'value' => 'Site Name',
        'text'  => __( 'Site Name', 'alt-manager' ),
    ],
        'Site Description'  => [
        'value' => 'Site Description',
        'text'  => __( 'Site Description', 'alt-manager' ),
    ],
        'Image Alt'         => [
        'value' => 'Image Alt',
        'text'  => __( 'Image Alt', 'alt-manager' ),
    ],
        'Image Name'        => [
        'value' => 'Image Name',
        'text'  => __( 'Image Name', 'alt-manager' ),
    ],
        'Image Caption'     => [
        'value' => 'Image Caption',
        'text'  => __( 'Image Caption', 'alt-manager' ),
    ],
        'Image Description' => [
        'value' => 'Image Description',
        'text'  => __( 'Image Description', 'alt-manager' ),
    ],
        '&'                 => [
        'value' => '&',
        'text'  => '&',
    ],
        '|'                 => [
        'value' => '|',
        'text'  => '|',
    ],
        '-'                 => [
        'value' => '-',
        'text'  => '-',
    ],
        '_'                 => [
        'value' => '_',
        'text'  => '_',
    ],
    );
    $alm_pages_options = array(
        'Page Title'        => [
        'value' => 'Page Title',
        'text'  => __( 'Page Title', 'alt-manager' ),
    ],
        'Site Name'         => [
        'value' => 'Site Name',
        'text'  => __( 'Site Name', 'alt-manager' ),
    ],
        'Site Description'  => [
        'value' => 'Site Description',
        'text'  => __( 'Site Description', 'alt-manager' ),
    ],
        'Image Alt'         => [
        'value' => 'Image Alt',
        'text'  => __( 'Image Alt', 'alt-manager' ),
    ],
        'Image Name'        => [
        'value' => 'Image Name',
        'text'  => __( 'Image Name', 'alt-manager' ),
    ],
        'Image Caption'     => [
        'value' => 'Image Caption',
        'text'  => __( 'Image Caption', 'alt-manager' ),
    ],
        'Image Description' => [
        'value' => 'Image Description',
        'text'  => __( 'Image Description', 'alt-manager' ),
    ],
        '&'                 => [
        'value' => '&',
        'text'  => '&',
    ],
        '|'                 => [
        'value' => '|',
        'text'  => '|',
    ],
        '-'                 => [
        'value' => '-',
        'text'  => '-',
    ],
        '_'                 => [
        'value' => '_',
        'text'  => '_',
    ],
    );
    $alm_post_options = array(
        'Post Title'        => [
        'value' => 'Post Title',
        'text'  => __( 'Post Title', 'alt-manager' ),
    ],
        'Site Name'         => [
        'value' => 'Site Name',
        'text'  => __( 'Site Name', 'alt-manager' ),
    ],
        'Site Description'  => [
        'value' => 'Site Description',
        'text'  => __( 'Site Description', 'alt-manager' ),
    ],
        'Image Alt'         => [
        'value' => 'Image Alt',
        'text'  => __( 'Image Alt', 'alt-manager' ),
    ],
        'Image Name'        => [
        'value' => 'Image Name',
        'text'  => __( 'Image Name', 'alt-manager' ),
    ],
        'Image Caption'     => [
        'value' => 'Image Caption',
        'text'  => __( 'Image Caption', 'alt-manager' ),
    ],
        'Image Description' => [
        'value' => 'Image Description',
        'text'  => __( 'Image Description', 'alt-manager' ),
    ],
        '&'                 => [
        'value' => '&',
        'text'  => '&',
    ],
        '|'                 => [
        'value' => '|',
        'text'  => '|',
    ],
        '-'                 => [
        'value' => '-',
        'text'  => '-',
    ],
        '_'                 => [
        'value' => '_',
        'text'  => '_',
    ],
    );
    
    if ( am_fs()->is_not_paying() ) {
        echo  '<div class="notice notice-success is-dismissible" style="text-align: center;">' ;
        echo  '<strong><span style="display: block;margin: 0.5em 0.5em 0 0;clear: both;color: #0f8377;font-size: 1vw;">' . __( 'Get Alt Manager Premium Features', 'alt-manager' ) . '</span></strong>' ;
        echo  '<strong><span style="display: block; margin: 0.5em; clear: both;">' ;
        echo  '<a href="' . am_fs()->get_upgrade_url() . '" style="color: #15375f;">' . __( 'Upgrade Now!', 'alt-manager' ) . '</a>' ;
        echo  '</span></strong>' ;
        echo  '</div>' ;
    }
    
    ?>
    <div class="wrap fs-section">
        <h2 class="nav-tab-wrapper">
            <a href="#" class="nav-tab fs-tab nav-tab-active home">Settings</a>
        </h2>
        <h1 class="alm-heading"><span class="dashicons dashicons-images-alt2"></span>
            <?php 
    _e( 'Alt Manager Settings', 'alt-manager' );
    // print_r($alm_home_options);
    ?></h1>


        <form method="post" action="options.php">
            <?php 
    //                                 var_dump(get_option('post_images_alt'));
    settings_fields( 'alm_settings' );
    do_settings_sections( 'alm_settings' );
    ?>

            <table class="form-table">
                <tr valign="bottom">
                    <th colspan="2">
                        <h3><?php 
    _e( 'Homepage Images Settings', 'alt-manager' );
    ?></h3>
                    </th>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php 
    _e( 'Home Images Alt', 'alt-manager' );
    ?></th>
                    <td>
                        <select name="home_images_alt[]" class="home-images-alt" multiple="multiple">

                            <?php 
    // 				var_dump(get_option('home_images_alt'));
    
    if ( !empty(get_option( 'home_images_alt' )) && is_array( get_option( 'home_images_alt' ) ) ) {
        foreach ( get_option( 'home_images_alt' ) as $option ) {
            echo  '<option value="' . esc_attr( $alm_home_options[$option]['value'] ) . '" selected="selected">' . $alm_home_options[$option]['text'] . '</option>' ;
        }
    } elseif ( !empty(get_option( 'home_images_alt' )) && !is_array( get_option( 'home_images_alt' ) ) ) {
        echo  '<option value="' . esc_attr( $alm_home_options[get_option( 'home_images_alt' )]['value'] ) . '" selected="selected">' . $alm_home_options[get_option( 'home_images_alt' )]['text'] . '</option>' ;
    }
    
    foreach ( $alm_home_options as $option ) {
        
        if ( is_array( get_option( 'home_images_alt' ) ) && !in_array( $option['value'], get_option( 'home_images_alt' ) ) ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        } elseif ( !is_array( get_option( 'home_images_alt' ) ) && get_option( 'home_images_alt' ) !== $option['value'] ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        }
    
    }
    ?>

                        </select>
                    </td>

                </tr>
                <tr valign="top">
                    <th scope="row"><?php 
    _e( 'Home Images Title', 'alt-manager' );
    ?></th>
                    <td>
                        <select name="home_images_title[]" class="home-images-title" multiple="multiple">
                            <?php 
    
    if ( !empty(get_option( 'home_images_title' )) && is_array( get_option( 'home_images_title' ) ) ) {
        foreach ( get_option( 'home_images_title' ) as $option ) {
            echo  '<option value="' . esc_attr( $alm_home_options[$option]['value'] ) . '" selected="selected">' . $alm_home_options[$option]['text'] . '</option>' ;
        }
    } elseif ( !empty(get_option( 'home_images_title' )) && !is_array( get_option( 'home_images_title' ) ) ) {
        echo  '<option value="' . esc_attr( $alm_home_options[get_option( 'home_images_title' )]['value'] ) . '" selected="selected">' . $alm_home_options[get_option( 'home_images_title' )]['text'] . '</option>' ;
    }
    
    foreach ( $alm_home_options as $option ) {
        
        if ( is_array( get_option( 'home_images_title' ) ) && !in_array( $option['value'], get_option( 'home_images_title' ) ) ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        } elseif ( !is_array( get_option( 'home_images_title' ) ) && get_option( 'home_images_title' ) !== $option['value'] ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        }
    
    }
    // echo  '<option value="' . esc_attr( $alm_home_options[get_option( 'home_images_title' )]['value'] ) . '" selected="selected">' . $alm_home_options[get_option( 'home_images_title' )]['text'] . '</option>' ;
    // if ( !empty(get_option( 'home_images_title' )) && is_array( get_option( 'home_images_title' ) ) ) {
    //     foreach ( $alm_home_options as $option ) {
    //         if ( !in_array( $option['value'], get_option( 'home_images_title' ) ) ) {
    //             echo  '<option value="' . esc_attr( $option['value'] ) . '">' . $option['text'] . '</option>' ;
    //         }
    //     }
    //     } elseif ( !empty(get_option( 'home_images_title' )) && !is_array( get_option( 'home_images_title' ) ) ) {
    //         foreach ( $alm_home_options as $option ) {
    //             if ( $option['value'] !==   get_option( 'home_images_title' )) {
    //                 echo  '<option value="' . esc_attr( $option['value'] ) . '">' . $option['text'] . '</option>' ;
    //             }
    //         }
    //     }
    ?>

                        </select>
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <p><strong><?php 
    _e( 'Note: ', 'alt-manager' );
    ?></strong><?php 
    _e( 'If homepage is set to Your latest posts alt and title will be site name by default.', 'alt-manager' );
    ?> </p>
                    </td>
                </tr>
                <tr valign="bottom">
                    <th colspan="2">
                        <h3><?php 
    _e( 'Pages Images Settings', 'alt-manager' );
    ?></h3>
                    </th>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php 
    _e( 'Pages Images Alt', 'alt-manager' );
    ?></th>
                    <td>
                        <select name="pages_images_alt[]" class="pages-images-alt" multiple="multiple">
                            <?php 
    
    if ( !empty(get_option( 'pages_images_alt' )) && is_array( get_option( 'pages_images_alt' ) ) ) {
        foreach ( get_option( 'pages_images_alt' ) as $option ) {
            echo  '<option value="' . esc_attr( $alm_pages_options[$option]['value'] ) . '" selected="selected">' . $alm_pages_options[$option]['text'] . '</option>' ;
        }
    } elseif ( !empty(get_option( 'pages_images_alt' )) && !is_array( get_option( 'pages_images_alt' ) ) ) {
        echo  '<option value="' . esc_attr( $alm_pages_options[get_option( 'pages_images_alt' )]['value'] ) . '" selected="selected">' . $alm_pages_options[get_option( 'pages_images_alt' )]['text'] . '</option>' ;
    }
    
    foreach ( $alm_pages_options as $option ) {
        
        if ( is_array( get_option( 'pages_images_alt' ) ) && !in_array( $option['value'], get_option( 'pages_images_alt' ) ) ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        } elseif ( !is_array( get_option( 'pages_images_alt' ) ) && get_option( 'pages_images_alt' ) !== $option['value'] ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        }
    
    }
    ?>

                        </select>
                    </td>

                </tr>
                <tr valign="top">
                    <th scope="row"><?php 
    _e( 'Pages Images Title', 'alt-manager' );
    ?></th>
                    <td>
                        <select name="pages_images_title[]" class="pages-images-title" multiple="multiple">
                            <?php 
    
    if ( !empty(get_option( 'pages_images_title' )) && is_array( get_option( 'pages_images_title' ) ) ) {
        foreach ( get_option( 'pages_images_title' ) as $option ) {
            echo  '<option value="' . esc_attr( $alm_pages_options[$option]['value'] ) . '" selected="selected">' . $alm_pages_options[$option]['text'] . '</option>' ;
        }
    } elseif ( !empty(get_option( 'pages_images_title' )) && !is_array( get_option( 'pages_images_title' ) ) ) {
        echo  '<option value="' . esc_attr( $alm_pages_options[get_option( 'pages_images_title' )]['value'] ) . '" selected="selected">' . $alm_pages_options[get_option( 'pages_images_title' )]['text'] . '</option>' ;
    }
    
    foreach ( $alm_pages_options as $option ) {
        
        if ( is_array( get_option( 'pages_images_title' ) ) && !in_array( $option['value'], get_option( 'pages_images_title' ) ) ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        } elseif ( !is_array( get_option( 'pages_images_title' ) ) && get_option( 'pages_images_title' ) !== $option['value'] ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        }
    
    }
    ?>
                        </select>
                    </td>
                </tr>
                <tr valign="bottom">
                    <th colspan="2">
                        <h3><?php 
    _e( 'Posts Images Settings', 'alt-manager' );
    ?></h3>
                    </th>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php 
    _e( 'Posts Images Alt', 'alt-manager' );
    ?></th>
                    <td>
                        <select name="post_images_alt[]" class="post-images-alt" multiple="multiple">
                            <?php 
    
    if ( !empty(get_option( 'post_images_alt' )) && is_array( get_option( 'post_images_alt' ) ) ) {
        foreach ( get_option( 'post_images_alt' ) as $option ) {
            echo  '<option value="' . esc_attr( $alm_post_options[$option]['value'] ) . '" selected="selected">' . $alm_post_options[$option]['text'] . '</option>' ;
        }
    } elseif ( !empty(get_option( 'post_images_alt' )) && !is_array( get_option( 'post_images_alt' ) ) ) {
        echo  '<option value="' . esc_attr( $alm_post_options[get_option( 'post_images_alt' )]['value'] ) . '" selected="selected">' . $alm_post_options[get_option( 'post_images_alt' )]['text'] . '</option>' ;
    }
    
    foreach ( $alm_post_options as $option ) {
        
        if ( is_array( get_option( 'post_images_alt' ) ) && !in_array( $option['value'], get_option( 'post_images_alt' ) ) ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        } elseif ( !is_array( get_option( 'post_images_alt' ) ) && get_option( 'post_images_alt' ) !== $option['value'] ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        }
    
    }
    ?>

                        </select>
                    </td>

                </tr>
                <tr valign="top">
                    <th scope="row"><?php 
    _e( 'Posts Images Title', 'alt-manager' );
    ?></th>
                    <td>
                        <select name="post_images_title[]" class="post-images-title" multiple="multiple">
                            <?php 
    
    if ( !empty(get_option( 'post_images_title' )) && is_array( get_option( 'post_images_title' ) ) ) {
        foreach ( get_option( 'post_images_title' ) as $option ) {
            echo  '<option value="' . esc_attr( $alm_post_options[$option]['value'] ) . '" selected="selected">' . $alm_post_options[$option]['text'] . '</option>' ;
        }
    } elseif ( !empty(get_option( 'post_images_title' )) && !is_array( get_option( 'post_images_title' ) ) ) {
        echo  '<option value="' . esc_attr( $alm_post_options[get_option( 'post_images_title' )]['value'] ) . '" selected="selected">' . $alm_post_options[get_option( 'post_images_title' )]['text'] . '</option>' ;
    }
    
    foreach ( $alm_post_options as $option ) {
        
        if ( is_array( get_option( 'post_images_title' ) ) && !in_array( $option['value'], get_option( 'post_images_title' ) ) ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        } elseif ( !is_array( get_option( 'post_images_title' ) ) && get_option( 'post_images_title' ) !== $option['value'] ) {
            echo  '<option value="' . esc_attr( $option['value'] ) . '" >' . $option['text'] . '</option>' ;
        }
    
    }
    ?>

                        </select>
                    </td>
                </tr>
                <?php 
    ?>
            </table>
            <?php 
    submit_button();
    ?>
        </form>
    </div>
<?php 
}
