<?php

add_action( 'admin_init', 'alm_settings' );
function alm_settings()
{
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
    $alm_pages_options = array( 'Page Title', 'Site Name', '' );
    $alm_post_options = array( 'Post Title', 'Site Name', '' );
    ?>
       <div class="wrap">
       <h1 class="alm-heading"><span class="dashicons dashicons-images-alt2"></span>Alt Manager Settings</h1>
       <form method="post" action="options.php"> 
       <?php 
    settings_fields( 'alm_settings' );
    do_settings_sections( 'alm_settings' );
    ?>
       <table class="form-table"> 
       <tr valign="bottom"><th colspan="2"><h3>Pages Images Settings</h3></th></tr>
<tr valign="top">
<th scope="row">Page Images Alt</th>
<td>
<select name="pages_images_alt">
<?php 
    foreach ( $alm_pages_options as $option ) {
        
        if ( get_option( 'pages_images_alt' ) == $option ) {
            echo  '<option value="' . esc_attr( $option ) . '" selected="selected">' . get_option( 'pages_images_alt' ) . '</option>' ;
        } else {
            echo  '<option value="' . esc_attr( $option ) . '">' . $option . '</option>' ;
        }
    
    }
    ?>

</select>
</td>

</tr>
<tr valign="top">
<th scope="row">Pages Images Title</th>
<td>
<select name="pages_images_title">
<?php 
    foreach ( $alm_pages_options as $option ) {
        
        if ( get_option( 'pages_images_title' ) == $option ) {
            echo  '<option value="' . esc_attr( $option ) . '" selected="selected">' . get_option( 'pages_images_title' ) . '</option>' ;
        } else {
            echo  '<option value="' . esc_attr( $option ) . '">' . $option . '</option>' ;
        }
    
    }
    ?>
</select>
</td>
</tr>
<tr valign="bottom"><th colspan="2"><h3>Post Images Settings</h3></th></tr>
<tr valign="top">
<th scope="row">Post Images Alt</th>
<td>
<select name="post_images_alt">
<?php 
    foreach ( $alm_post_options as $option ) {
        
        if ( get_option( 'post_images_alt' ) == $option ) {
            echo  '<option value="' . esc_attr( $option ) . '" selected="selected">' . get_option( 'post_images_alt' ) . '</option>' ;
        } else {
            echo  '<option value="' . esc_attr( $option ) . '">' . $option . '</option>' ;
        }
    
    }
    ?>

</select>
</td>

</tr>
<tr valign="top">
<th scope="row">Post Images Title</th>
<td>
<select name="post_images_title">
<?php 
    foreach ( $alm_post_options as $option ) {
        
        if ( get_option( 'post_images_title' ) == $option ) {
            echo  '<option value="' . esc_attr( $option ) . '" selected="selected">' . get_option( 'post_images_title' ) . '</option>' ;
        } else {
            echo  '<option value="' . esc_attr( $option ) . '">' . $option . '</option>' ;
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
