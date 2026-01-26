<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */
$rainbow_options = rainbow_helper::rainbow_get_options();
?> </div>
			</div>
            <?php if ( is_active_sidebar( 'sidebar-shop' ) && $rainbow_options['wc_general_sidebar'] == 'right') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                    <?php dynamic_sidebar('sidebar-shop'); ?>
                </div>
            <?php } ?>
		</div>
	</div>
</div>