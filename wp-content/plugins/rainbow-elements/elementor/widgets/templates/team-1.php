<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

$thumb_size  = "full";
$args = array(
	'post_type'      => "rainbow_team",
	'posts_per_page' => $settings['number'],
	'orderby'        => $settings['orderby'],
);

if ( !empty( $settings['cat_list'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => "rainbow_team_category",
			'field' => 'term_id',
			'terms' => $settings['cat_list'],
		)
	);
}
switch ( $settings['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}


$query = new WP_Query( $args );
$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']} col-{$settings['col']}";
$temp = rainbow_helper::wp_set_temp_query( $query );
?>
<div class="team-section">
	<div class="row">
	<?php if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
					$id            = get_the_id();
					$designation   = get_post_meta( $id, "team_designation", true );					
					$rainbow_author_twitter 		= get_post_meta( $id, $themepfix.'_twitter', true );
					$rainbow_author_facebook 		= get_post_meta( $id, $themepfix.'_facebook', true );
					$rainbow_author_linkedin 		= get_post_meta( $id, $themepfix.'_linkedin', true );
					$rainbow_author_pinterest 		= get_post_meta( $id, $themepfix. '_pinterest', true );
					$rainbow_author_designation 	= get_post_meta( $id, $themepfix.'_author_designation', true );
				?>

			
					<div class="<?php echo esc_attr( $col_class );?>">
						 <div class="team-grid">
                            <div class="thumbnail">
                               <?php 
									if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
									} ?>
								<?php if ($settings['social_display']  == 'yes'): ?>
                                <button class="plus-icon"><i class="fas fa-plus"></i></button>


							  <?php 
							$rows = get_field('team_social_icons_field_5e4b96f6dc7f8');
							if( $rows ) {
							    echo '<ul class="list-unstyled social-icon">';
							    foreach( $rows as $row ) {

							    echo '<li><a href="'. $row['team_enter_social_icon_link'] .' ">'. $row['team_enter_social_icon_markup'] .'</a></li>';
							       
							       
							    }
							    echo '</ul>';
							} ?>
							 <?php endif ?>		
                            </div>
                            <div class="content">  
                                <?php if ( $designation && $settings['designation_display']  == 'yes' ): ?>
		            				<div class="subtitle"><?php echo esc_html( $designation );?></div>	
		            			<?php endif; ?>
                                <h6 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                            </div>
                        </div>
					</div>
				<?php endwhile;?>
			<?php endif;?>
		<?php rainbow_helper::wp_reset_temp_query( $temp );?>
		</div>
	</div>
