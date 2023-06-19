<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Logo Section Start -->
	<?php 
	$header_logo=get_field("header_logo","option");
	if(!empty($header_logo)){
	?>
	<div class="Logo">
		<div class="wrapper">
			<a href="<?php echo site_url();?>">
				<img src="<?php echo $header_logo; ?>">
			</a>
		</div>
	</div>
	<?php } ?>
	<!-- Logo Section End -->

