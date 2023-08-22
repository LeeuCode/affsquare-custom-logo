<div class="wrap">
    <h1>
        <?php _e('Custom Site Logo Setting', 'affsquare'); ?>
    </h1>

    <form method="post" action="options.php">
        <?php settings_fields('custom_logo_setting'); ?>
        <?php do_settings_sections('custom_logo_setting'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">Custom Logo</th>
                <td>
                    <p>
                        <?php 
                        $imageID = get_option('custom_logo');
                        $imageUrl = plugin_dir_url(__DIR__) . 'assets/images/default-image.jpg';

                        if ($imageID) {
                            $imageUrl = wp_get_attachment_url($imageID);
                        }
                        
                        ?>
                        <img class="logo-image" width="200" src="<?php echo  $imageUrl; ?>"
                            alt="<?php bloginfo('name'); ?>">
                    </p>
                    
                    <input type="hidden" class="logo-input" name="custom_logo" value="<?php echo $imageID; ?>" />
                    <button class="button upload-custom-logo">Upload</button>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>