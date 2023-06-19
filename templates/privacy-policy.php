<?php

/**
 * Template Name: Privacy Policy Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */
get_header();
?>

<!-- Privacy Policy Content Start -->
<?php
$pp_tagline = get_field("pp_tagline");
$pp_content = get_field("pp_content");
$pp_address = get_field("pp_address");
if (!empty($pp_content)) {
?>
    <div class="PrivacyPolicy_section">
        <div class="wrapper">
            <div class="PrivacyPolicy_inner">
                <div class="PrivacyPolicy_box whitefont">
                    <h1><?php echo get_the_title($post->ID); ?></h1>
                    <span class="tagLine"><?php echo $pp_tagline; ?></span>
                    <div class="PrivacyPolicy_boxInner stylelist">
                        <?php echo $pp_content; ?>
                        <?php if (!empty($pp_address)) { ?>
                            <div class="BottomContent_Address">
                                <?php echo $pp_address; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
get_footer();
?>