<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */

?>

<!-- Footer Section Start -->
<?php
$address_logo = get_field("address_logo", "option");
$address_detail = get_field("address_detail", "option");
$contact_logo = get_field("contact_logo", "option");
$contact_number = get_field("contact_number", "option");
$footer_logo = get_field("footer_logo", "option");
$desclaimer_note_heading = get_field("desclaimer_note_heading", "option");
$desclaimer_note_content = get_field("desclaimer_note_content", "option");

if (!empty($footer_logo)) {
?>
	<footer class="footer">
		<div class="wrapper">
			<div class="FooterInner">
				<div class="FooterBox">
					<div class="FooterLeft">
						<div class="address">
							<span><img src="<?php echo $address_logo; ?>"></span>
							<p>
								<?php echo $address_detail; ?>
							</p>
						</div>
						<div class="ContactDetails">
							<a href="tel:<?php echo $contact_number; ?>"><span><img src="<?php echo $contact_logo; ?>"></span> <?php echo $contact_number; ?></a>
						</div>

						<div class="FooterLogo">
							<a href="<?php echo site_url(); ?>"><img src="<?php echo $footer_logo; ?>"></a>
						</div>

					</div>
					<div class="FooterRight">
						<h3><?php echo $desclaimer_note_heading; ?></h3>
						<?php echo $desclaimer_note_content; ?>
					</div>
				</div>
			</div>
			<?php
			$privacy_policy_page = get_field("privacy_policy_page","option", false);
			if (!empty($privacy_policy_page)) {
			?>
				<div class="PrivacyPolicy">
					<a href="<?php echo get_permalink($privacy_policy_page); ?>"><?php echo get_the_title($privacy_policy_page); ?></a>
				</div>
			<?php } ?>
		</div>
	</footer>
	<!-- Footer Section End -->

<?php }
wp_footer();
?>
</body>

</html>