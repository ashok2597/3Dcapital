<?php
get_header();
?>

<!-- Tabbing Section Start -->
<div class="TabbingSection">
	<div class="wrapper">
		<div class="tab-block" id="tab-block">
			<?php if (have_rows('sec2_tabbing')) : ?>
				<ul class="tab-mnu">
					<?php while (have_rows('sec2_tabbing')) : the_row();
						$tab_block_icon1 = get_sub_field('tab_block_icon1');
						$tab_block_icon2 = get_sub_field('tab_block_icon2');
						$tab_block_title = get_sub_field('tab_block_title');
						if(!empty($tab_block_title)) {
					?>
						<li class="<?php if (get_row_index() == 1) {
										echo "active";
									} ?>">
							<span class="iconWhite"><img src="<?php echo $tab_block_icon1; ?>"></span><span class="iconBlack"><img src="<?php echo $tab_block_icon2; ?>"></span><?php echo $tab_block_title; ?>
						</li>
					<?php } endwhile; ?>
				</ul>
			<?php endif; ?>
			<?php if (have_rows('sec2_tabbing')) : ?>
				<div class="tab-cont">
					<?php while (have_rows('sec2_tabbing')) : the_row();
						$tab_content_list = get_sub_field('tab_content_list');
						$tab_content_image = get_sub_field('tab_content_image');
						if(!empty($tab_content_list)){
					?>
						<div class="tab-pane">
							<div class="TabbLeft">
								<?php echo $tab_content_list; ?>
							</div>
							<div class="TabbRight">
								<img src="<?php echo $tab_content_image; ?>">
							</div>
						</div>
					<?php } endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
		$sec2_form_scroll_btn_id = get_field("sec2_form_scroll_btn_id");
		$sec2_form_scroll_btn_name = get_field("sec2_form_scroll_btn_name");
		if (!empty($sec2_form_scroll_btn_name)) { ?>
			<div class="button">
				<a href="#<?php echo $sec2_form_scroll_btn_id; ?>"><?php echo $sec2_form_scroll_btn_name; ?></a>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- Tabbing Section End -->

<!-- Produces Returns Start -->
<div class="Produces_Returns">
	<div class="wrapper">
		<?php
		$sec3_pr_heading1 = get_field("sec3_pr_heading1");
		$sec3_pr_heading_icon = get_field("sec3_pr_heading_icon");
		$sec3_pr_heading2 = get_field("sec3_pr_heading2");
		$sec3_pr_main_content = get_field("sec3_pr_main_content");
		?>
		<div class="SectionHeading">
			<h2 class="whitefont"><?php echo $sec3_pr_heading1; ?><span><img src="<?php echo $sec3_pr_heading_icon; ?>"></span><?php echo $sec3_pr_heading2; ?></h2>
			<div class="whitefont opacity8">
				<?php echo $sec3_pr_main_content; ?>
			</div>
		</div>

		<?php if (have_rows('sec3_pr_inner_content')) : ?>
			<div class="Produces_Returns_inner">
				<?php while (have_rows('sec3_pr_inner_content')) : the_row();
					$pr_inner_content_icon1 = get_sub_field('pr_inner_content_icon1');
					$pr_inner_content_icon2 = get_sub_field('pr_inner_content_icon2');
					$pr_inner_content_title = get_sub_field('pr_inner_content_title');
					$pr_inner_content_mail_content = get_sub_field('pr_inner_content_mail_content');
					if(!empty($pr_inner_content_icon1)){
				?>
					<div class="Produces_Returns_box">
						<div class="StepNumber whitefont">
							<img src="<?php echo $pr_inner_content_icon1; ?>">
						</div>
						<div class="Icon">
							<img src="<?php echo $pr_inner_content_icon2; ?>">
						</div>
						<div class="Content whitefont">
							<h6><?php echo $pr_inner_content_title; ?></h6>
							<div class="opacity8">
								<p><?php echo $pr_inner_content_mail_content; ?></p>
							</div>
						</div>
					</div>
				<?php } endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<!-- Produces Returns End -->

<!-- Team Section Start -->
<?php if (have_rows('sec4_team_box_content')) : ?>
	<div class="teamSection">
		<div class="wrapper">
			<div class="TeamInner">
				<?php while (have_rows('sec4_team_box_content')) : the_row();
					$sec4_team_member_image = get_sub_field('sec4_team_member_image');
					$sec4_team_member_name = get_sub_field('sec4_team_member_name');
					$sec4_team_member_position = get_sub_field('sec4_team_member_position');
					$sec4_team_member_email = get_sub_field('sec4_team_member_email');
					$sec4_team_member_detail = get_sub_field('sec4_team_member_detail');
					if (!empty($sec4_team_member_image )) { 
				?>
					<div class="TeamBox">
						<div class="TeamMemberimg">
							<img src="<?php echo $sec4_team_member_image; ?>">
						</div>
						<div class="TeamMemberDetails">
							<div class="NamePosition">
								<h3><?php echo $sec4_team_member_name; ?></h3>
								<span><?php echo $sec4_team_member_position; ?></span>
							</div>
							<div class="TeamEmail">
								<a href="mailto:<?php echo $sec4_team_member_email; ?>"><?php echo $sec4_team_member_email; ?></a>
							</div>
							<div class="Detail opacity8">
								<?php echo $sec4_team_member_detail; ?>
							</div>
						</div>
					</div>
				<?php } endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- Team Section End -->

<!-- Active Management Strategies Start -->
<?php
$sec5_ms_heading_icon = get_field('sec5_ms_heading_icon');
$sec5_ms_heading_title = get_field('sec5_ms_heading_title');
$sec5_ms_content_title = get_field('sec5_ms_content_title');
$sec5_ms_content_list = get_field('sec5_ms_content_list');
$sec5_ms_graph_img = get_field('sec5_ms_graph_img');
?>
<div class="ManagementStrategies">
	<div class="wrapper">
		<?php if (!empty($sec5_ms_content_list)) { ?>
			<div class="SectionHeading">
				<h2 class="whitefont"><span><img src="<?php echo $sec5_ms_heading_icon; ?>"></span><?php echo $sec5_ms_heading_title; ?></h2>
				<div class="whitefont opacity8">
					<p><?php echo $sec5_ms_content_title; ?></p>
				</div>
			</div>
			<div class="TwoColumn">
				<div class="TwoColumn_Content whitefont opacity8 stylelist">
					<?php echo $sec5_ms_content_list; ?>
				</div>
				<div class="TwoColumn_img">
					<img src="<?php echo $sec5_ms_graph_img; ?>">
				</div>
			</div>
		<?php } ?>

		<?php if (have_rows('sec6_ms_table')) : ?>
			<div class="TableDetails">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<th style="width: 24.03%;">Jan 2020 - Jan 2023</th>
						<th style="width: 18.97%;">3D Bull/Bear</th>
						<th style="width: 21.02%;">3D Hedged Equity</th>
						<th style="width: 18.97%;">3D Bear</th>
						<th style="width: 17.01%;">S&P 500</th>
					</tr>
					<?php while (have_rows('sec6_ms_table')) : the_row();
						$sec6_table_td_title = get_sub_field('sec6_table_td_title');
						$sec6_table_tr1 = get_sub_field('sec6_table_tr1');
						$sec6_table_tr2 = get_sub_field('sec6_table_tr2');
						$sec6_table_tr3 = get_sub_field('sec6_table_tr3');
						$sec6_table_tr4 = get_sub_field('sec6_table_tr4');
						if (!empty($sec6_table_td_title)) {
					?>
							<tr>
								<td><?php echo $sec6_table_td_title; ?></td>
								<td class="text-center"><?php echo $sec6_table_tr1; ?></td>
								<td class="text-center"><?php echo $sec6_table_tr2; ?></td>
								<td class="text-center"><?php echo $sec6_table_tr3; ?></td>
								<td class="text-center"><?php echo $sec6_table_tr4; ?></td>
							</tr>
					<?php }
					endwhile; ?>
				</table>
			</div>
		<?php endif; ?>
		<?php
		$sec6_table_explaination = get_field("sec6_table_explaination");
		if (!empty($sec6_table_explaination)) {
		?>
			<div class="tableBottom whitefont opacity8">
				<?php echo $sec6_table_explaination; ?>
			</div>
		<?php } ?>
	</div>
</div>
<!-- Active Management Strategies End -->

<!-- Form Section Start -->
<?php
$sec6_fs_heading1 = get_field('sec6_fs_heading1');
$sec6_fs_heading_img = get_field('sec6_fs_heading_img');
$sec6_fs_heading2 = get_field('sec6_fs_heading2');
$sec6_fs_client_partner_img = get_field('sec6_fs_client_partner_img');
$sec6_fs_client_partner_name = get_field('sec6_fs_client_partner_name');
$sec6_fs_client_partner_position = get_field('sec6_fs_client_partner_position');
$sec6_fs_client_partner_email = get_field('sec6_fs_client_partner_email');
$sec6_form_short_code = get_field('sec6_form_short_code');
if (!empty($sec6_form_short_code)) {
?>
	<div class="formSection" id="<?php echo $sec2_form_scroll_btn_id; ?>">
		<div class="wrapper">
			<div class="SectionHeading">
				<h2 class="whitefont"><?php echo $sec6_fs_heading1; ?><span><img src="<?php echo $sec6_fs_heading_img; ?>"></span><?php echo $sec6_fs_heading2; ?></h2>
			</div>
			<div class="FormInner">
				<div class="FormLeft">
					<div class="FormLeftImg">
						<img src="<?php echo $sec6_fs_client_partner_img; ?>">
					</div>
					<div class="Details">
						<h3><?php echo $sec6_fs_client_partner_name; ?></h3>
						<span><?php echo $sec6_fs_client_partner_position; ?></span>
					</div>
					<div class="email">
						<a href="mailto:<?php echo $sec6_fs_client_partner_email; ?>"><?php echo $sec6_fs_client_partner_email; ?></a>
					</div>
				</div>
				<div class="CommonForm">
					<?php echo do_shortcode($sec6_form_short_code); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Form Section End -->
<?php
}
get_footer();
?>