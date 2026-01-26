<?php
/**
 * Pro features preview panel.
 *
 * @package   contact-form-7-mailchimp-extension
 * @author    renzo.johnson@gmail.com
 * @copyright 2014-2026 https://renzojohnson.com
 * @license   GPL-3.0+
 */

defined( 'ABSPATH' ) || exit;

class Cmatic_Pro_Features_Preview {
	public static function render() {
		?>
		<div class="vc-hidden-start">

			<div class="mce-custom-fields holder-img">
				<h3 class="title">Audience TAGs - <span class="audience-name"><a href="<?php echo esc_url( Cmatic_Pursuit::upgrade( 'tags_header' ) ); ?>" target="_blank" title="ChimpMatic Pro Options">PRO Feature</a></span></h3>
				<p>You can add these as your contacts tags:</p>
				<div id="chm_panel_camposformatags">
					<label class="pr10"><input type="checkbox" id="wpcf7-mailchimp-labeltags-1" name="wpcf7-mailchimp[labeltags][your-name]" value="1">
						[your-name] <span class="mce-type">text</span></label>
					<label class="pr10"><input type="checkbox" id="wpcf7-mailchimp-labeltags-3" name="wpcf7-mailchimp[labeltags][your-number]" value="1">
						[your-number] <span class="mce-type">number</span></label>
					<label class="pr10"><input type="checkbox" id="wpcf7-mailchimp-labeltags-4" name="wpcf7-mailchimp[labeltags][your-height]" value="1" checked="checked">
						[your-car] <span class="mce-type">text</span></label>
					<label class="atags"><b>Arbitrary Tags Here:</b> <input type="text" id="wpcf7-mailchimp-labeltags_cm-tag" name="wpcf7-mailchimp[labeltags_cm-tag]" value="genre, [card-brand]" placeholder="comma, separated, texts, or [mail-tags]">
						<p class="description">You can type in your tags here. Comma separated text or [mail-tags]</p>
					</label>
				</div>
				<a class="lin-to-pro" href="<?php echo esc_url( Cmatic_Pursuit::upgrade( 'tags_link' ) ); ?>" target="_blank" title="ChimpMatic Pro Options"><span>PRO Feature <span>Learn More...</span></span></a>
			</div>

			<div class="mce-custom-fields holder-img">
				<h3 class="title">Audience GROUPs - <span class="audience-name"><a href="<?php echo esc_url( Cmatic_Pursuit::upgrade( 'groups_header' ) ); ?>" target="_blank" title="ChimpMatic Pro Options">PRO Feature</a></span></h3>
				<p>Match them to your Contact Form checkboxes or radio buttons:</p>
				<div id="chm_panel_camposformagroup">
					<div class="mcee-container">
						<label>Car Brand <span class="mce-type">id: 4ce1c8eff2 - type: checkboxes</span>
							<input type="hidden" id="wpcf7-mailchimp-ggCustomKey1" value="4ce1c8eff2" name="wpcf7-mailchimp[ggCustomKey1]">
							<span class="glocks"><span class="dashicons dashicons-lock blue"></span>
								<input type="checkbox" class="chimp-gg-arbirary" data-tag="1" id="wpcf7-mailchimp-ggCheck1" name="wpcf7-mailchimp[ggCheck1]" value="1">
							</span>
						</label>
						<select class="chm-select" id="wpcf7-mailchimp-ggCustomValue1" name="wpcf7-mailchimp[ggCustomValue1]" style="width:95%">
							<option value=" ">Choose.. </option>
							<option value="my-gdpr1" selected="selected">[car-brand] - type: checkbox</option>
							<option value="my-gdpr2">[car-color] - type: checkbox</option>
							<option value="my-gdpr3">[my-size] - type: checkbox</option>
						</select>
					</div>
				</div>
				<a class="lin-to-pro" href="<?php echo esc_url( Cmatic_Pursuit::upgrade( 'groups_link' ) ); ?>" target="_blank" title="ChimpMatic Pro Options"><span>PRO Feature  <span>Learn More...</span></span></a>
			</div>

			<div class="mce-custom-fields holder-img">
				<h3 class="title">Audience GDPR Marketing Preferences - <span class="audience-name"><a href="<?php echo esc_url( Cmatic_Pursuit::upgrade( 'gdpr_header' ) ); ?>" target="_blank" title="ChimpMatic Pro Options">PRO Feature</a></span></h3>
				<p>Match them to your Contact Form checkboxes:</p>
				<div id="chm_panel_camposformaGDPR">
					<div class="mcee-container">
						<label>Email <span class="mce-type">id: 74de728e79</span>
							<input type="hidden" id="wpcf7-mailchimp-GDPRcustomKey1" value="74de728e79" name="wpcf7-mailchimp[GDPRcustomKey1]">
						</label>
						<select class="chm-select" id="wpcf7-mailchimp-GDPRCustomValue1" name="wpcf7-mailchimp[GDPRCustomValue1]" style="width:95%">
							<option value=" ">Choose.. </option>
							<option value="my-gdpr1" selected="selected">[my-gdpr1] - type: checkbox</option>
							<option value="my-gdpr2">[my-gdpr2] - type: checkbox</option>
							<option value="my-gdpr3">[my-gdpr3] - type: checkbox</option>
						</select>
					</div>
					<div class="mcee-container">
						<label>Direct Mail <span class="mce-type">id: 701c19a03b</span>
							<input type="hidden" id="wpcf7-mailchimp-GDPRcustomKey2" value="701c19a03b" name="wpcf7-mailchimp[GDPRcustomKey2]">
						</label>
						<select class="chm-select" id="wpcf7-mailchimp-GDPRCustomValue2" name="wpcf7-mailchimp[GDPRCustomValue2]" style="width:95%">
							<option value=" ">Choose.. </option>
							<option value="my-gdpr1">[my-gdpr1] - type: checkbox</option>
							<option value="my-gdpr2" selected="selected">[my-gdpr2] - type: checkbox</option>
							<option value="my-gdpr3">[my-gdpr3] - type: checkbox</option>
						</select>
					</div>
				</div>
				<a class="lin-to-pro" href="<?php echo esc_url( Cmatic_Pursuit::upgrade( 'gdpr_link' ) ); ?>" target="_blank" title="ChimpMatic Pro Options"><span>PRO Feature <span>Learn More...</span></span></a>
			</div>
		</div>
		<?php
	}
}
