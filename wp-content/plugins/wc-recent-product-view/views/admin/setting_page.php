<?php 

if(!defined('ABSPATH')){
    die("don't access.");
}

function rvps_setting_page_cb(){
    ?>
    <div id="wpbody" role="main">
        <div id="wpbody-content" aria-label="Main content" tabindex="0">
            <div class="wrap">
                <h1><?php _e('WC Recently Viewed Products', 'rvps') ?></h1>
                <table class="form-table">
                    <tbody>
                        <form method="post" action="admin-post.php" novalidate="novalidate">
                            <input type="hidden" name="action" value="rvps_save_settings_fields">
                            <?php 
                                wp_nonce_field('rvps_save_settings_fields_verify');
                                $settings = get_option('rvps_settings');
                            ?>
                            <!-- Label Wigdet -->
                            <tr>
                                <th>
                                    <label for="rvps_label">
                                        <?php _e('Recently Viewed Products Label', 'rvps') ?>
                                    </label>
                                </th>
                                <td>
                                    <input id="rvps_label" name="rvps_label" value="<?php echo isset($settings['rvps_label']) ? esc_attr($settings['rvps_label']) : ''; ?>" type="text" required>
                                </td>
                            </tr>

                            <!-- No of Products Wigdet -->
                            <tr>
                                <th>
                                    <label for="rvps_numb_products">
                                        <?php _e('Number of Recently Viewed Products', 'rvps') ?>
                                    </label>
                                </th>
                                <td>
                                    <input id="rvps_numb_products" name="rvps_numb_products" value="<?php echo isset($settings['rvps_numb_products']) ? esc_attr($settings['rvps_numb_products']) : ''; ?>" type="number" required>
                                </td>
                            </tr>

                            <!-- Position Wigdet -->
                            <tr>
                                <th>
                                    <label for="rvps_position">
                                        <?php _e('Recently Viewed Products Position in Product Page', 'rvps') ?>
                                    </label>
                                </th>
                                <td>
                                    <input <?php checked(isset($settings['rvps_position']) && $settings['rvps_position'] == 'before_related_product', true); ?> id="rvps_position_before" name="rvps_position" value="before_related_product" type="radio">
                                    <span style="padding-right:20px;" ><?php _e('Before related products')?></span>

                                    <input <?php checked(isset($settings['rvps_position']) && $settings['rvps_position'] == 'after_related_product', true); ?> id="rvps_position_after" name="rvps_position" value="after_related_product" type="radio">
                                    <span style="padding-right:20px;" ><?php _e('After related products')?></span>
                                </td>
                            </tr> <!-- end of widget -->

                            <!-- Shop Page Wigdet -->
                            <tr>
                                <th>
                                    <label for="rvps_in_shop_page">
                                        <?php _e('Show Recently Viewed Products in Shop Page', 'rvps') ?>
                                    </label>
                                </th>
                                <td>
                                    <input <?php checked(isset($settings['rvps_in_shop_page']) && $settings['rvps_in_shop_page'] == 'enabled', true); ?> id="rvps_in_shop_page" name="rvps_in_shop_page" value="enabled" type="checkbox">
                                    <span><?php _e( 'Show', 'rvps' ); ?></span>
                                </td>
                            </tr> <!-- end of widget -->

                            <!-- Cart Page Wigdet -->
                            <tr>
                                <th>
                                    <label for="rvps_in_cart_page">
                                        <?php _e('Show Recently Viewed Products in Cart Page', 'rvps') ?>
                                    </label>
                                </th>
                                <td>
                                    <input <?php checked(isset($settings['rvps_in_cart_page']) && $settings['rvps_in_cart_page'] == 'enabled', true); ?> id="rvps_in_cart_page" name="rvps_in_cart_page" value="enabled" type="checkbox">
                                    <span><?php _e( 'Show', 'rvps' ); ?></span>
                                </td>
                            </tr> <!-- end of widget -->

                            <!-- Submit Wigdet -->
                            <tr>
                                <td>
                                    <p class="submit">
                                        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                                    </p>
                                </td>
                            </tr>  <!-- end of widget -->
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}