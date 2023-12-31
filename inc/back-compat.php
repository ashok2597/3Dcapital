<?php
/**
 * 3D Capital back compat functionality
 *
 * Prevents 3D Capital from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 3D Capital 1.0.0
 */

/**
 * Prevent switching to 3D Capital on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 3D Capital 1.0.0
 */
function capital_theme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'capital_theme_upgrade_notice' );
}
add_action( 'after_switch_theme', 'capital_theme_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * 3D Capital on WordPress versions prior to 4.7.
 *
 * @since 3D Capital 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function capital_theme_upgrade_notice() {
	$message = sprintf( __( '3D Capital requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'capital_theme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since 3D Capital 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function capital_theme_customize() {
	wp_die(
		sprintf(
			__( '3D Capital requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'capital_theme' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'capital_theme_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since 3D Capital 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function capital_theme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( '3D Capital requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'capital_theme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'capital_theme_preview' );
