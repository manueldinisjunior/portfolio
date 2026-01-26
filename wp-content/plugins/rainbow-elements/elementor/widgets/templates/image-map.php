<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
?>
<div class="rainbow-signin-banner bg_image bg_image--9">
	<h2 class="title"><?php echo esc_attr( $settings['info_title'] );?></h2>
	<?php if ( $settings['info_contact'] ): ?>
		<p><?php echo esc_attr( $settings['info_contact'] );?></p>
		<?php endif; ?>	
</div>