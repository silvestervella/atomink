<?php
add_action( 'admin_init', 'atominktheme_register_setting_fields' );

function atominktheme_register_setting_fields() {
    //register our settings
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_the_address' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_the_phone' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_the_email' );

    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_monday' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_tuesday' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_wednesday' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_thursday' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_friday' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_saturday' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_sunday' );

    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_monday_closing' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_tuesday_closing' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_wednesday_closing' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_thursday_closing' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_friday_closing' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_saturday_closing' );
    register_setting( 'atominktheme_custom_settings_group', 'atominktheme_opening_sunday_closing' );
}


function atominktheme_theme_option_page() {
    ?>
    <div class="custom-options-wrap">
    <h1>Theme Custom Settings</h1>
    
    <form method="post" action="options.php">
        <?php settings_fields( 'atominktheme_custom_settings_group' ); ?>
        <?php do_settings_sections( 'atominktheme_custom_settings_group' ); ?>
        <table class="form-table">
            <tr class="address" valign="top">
            <th scope="row">Address</th>
            <td><input type="text" name="atominktheme_the_address" value="<?php echo esc_attr( get_option('atominktheme_the_address') ); ?>" /></td>
            </tr>
             
            <tr class="phone" valign="top">
            <th scope="row">Phone</th>
            <td><input type="number" name="atominktheme_the_phone" value="<?php echo esc_attr( get_option('atominktheme_the_phone')); ?>" /></td>
            </tr>
            
            <tr class="email" valign="top">
            <th scope="row">Email</th>
            <td><input type="text" name="atominktheme_the_email" value="<?php echo esc_attr( get_option('atominktheme_the_email') ); ?>" /></td>
            </tr>

            <tr class="hours" valign="top">
            <th scope="row">Opening Hours</th>
            <td><span>Monday:</span> Open: <input type="time" name="atominktheme_opening_monday" value="<?php echo esc_attr( get_option('atominktheme_opening_monday') ); ?>" />  Close: <input type="time" name="atominktheme_opening_monday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_monday_closing') ); ?>" /></td>
            <td><span>Tuesday:</span> Open: <input type="time" name="atominktheme_opening_tuesday" value="<?php echo esc_attr( get_option('atominktheme_opening_tuesday') ); ?>" /> Close: <input type="time" name="atominktheme_opening_tuesday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_tuesday_closing') ); ?>" /></td>
            <td><span>Wednesday:</span> Open: <input type="time" name="atominktheme_opening_wednesday" value="<?php echo esc_attr( get_option('atominktheme_opening_wednesday') ); ?>" /> Close: <input type="time" name="atominktheme_opening_wednesday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_wednesday_closing') ); ?>" /></td>
            <td><span>Thursday:</span> Open: <input type="time" name="atominktheme_opening_thursday" value="<?php echo esc_attr( get_option('atominktheme_opening_thursday') ); ?>" /> Close: <input type="time" name="atominktheme_opening_thursday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_thursday_closing') ); ?>" /></td>
            <td><span>Friday:</span> Open: <input type="time" name="atominktheme_opening_friday" value="<?php echo esc_attr( get_option('atominktheme_opening_friday') ); ?>" /> Close: <input type="time" name="atominktheme_opening_friday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_friday_closing') ); ?>" /></td>
            <td><span>Saturday:</span> Open: <input type="time" name="atominktheme_opening_saturday" value="<?php echo esc_attr( get_option('atominktheme_opening_saturday') ); ?>" /> Close: <input type="time" name="atominktheme_opening_saturday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_saturday_closing') ); ?>" /></td>
            <td><span>Sunday:</span> Open: <input type="time" name="atominktheme_opening_sunday" value="<?php echo esc_attr( get_option('atominktheme_opening_sunday') ); ?>" /> Close: <input type="time" name="atominktheme_opening_sunday_closing" value="<?php echo esc_attr( get_option('atominktheme_opening_sunday_closing') ); ?>" /></td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    
    </form>
    </div>
    <?php } ?>