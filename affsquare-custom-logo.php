<?php
/*
 * Plugin Name:       Affsquare Custom Logo
 * Plugin URI:        https://github.com/LeeuCode/affsquare-custom-logo
 * Description:       Affsquare Wordpress Technical Task (Customize Logo).
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Eng Ahmed
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/LeeuCode/affsquare-custom-logo/
 * Text Domain:       affsquare-custom-logo
 * Domain Path:       /languages
 */


// Enqueue a script in the WordPress admin on edit.php.
function affsquare_enqueue_admin_script($hook)
{
    // Run styles in this plugin page only.
    if ('settings_page_affsquare-custom-logo-page' != $hook) {
        return;
    }

    // Main Js File to this pluin.
    wp_enqueue_script(
        'affsquare-plugin-js',
        plugin_dir_url(__FILE__) . '/assets/js/plugin-app.js',
        array('jquery'),
        '1.0'
    );

    // Allow Upload media in js.
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'affsquare_enqueue_admin_script');

// Create custom submenu page child settings menu page.
function affsquare_custom_logo_page()
{
    add_submenu_page(
        'options-general.php',
        __('Custom Logo', 'affsquare'),
        __('Custom Logo', 'affsquare'),
        'manage_options',
        'affsquare-custom-logo-page',
        'affsquare_custom_option_page'
    );

    add_action('admin_init', 'register_affsquare_custom_settings');
}
add_action('admin_menu', 'affsquare_custom_logo_page');

// Option Page View.
function affsquare_custom_option_page()
{
    require_once plugin_dir_path(__FILE__) . '/view/custom-page.php';
}

// Register Fields option page. 
function register_affsquare_custom_settings()
{
    // Update custom_logo in options.
    register_setting('custom_logo_setting', 'custom_logo');

    // Update custom_logo theme option.
    set_theme_mod('custom_logo', get_option('custom_logo'));
}