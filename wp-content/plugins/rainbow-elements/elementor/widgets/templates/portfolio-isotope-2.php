<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package rainbow-elements
 */
 
if ($settings['image_size_iso'] == 'yes') {	
	if ($settings['col_lg'] == '6') {
			$thumb_size  = "abc-size2-portfolio";
		} else if ($settings['col_lg'] == '4') {
			$thumb_size  = "abc-size3-portfolio";		
		} else if ($settings['col_lg'] == '3') {
			$thumb_size  = "abc-size4-portfolio";		
		} else {			
			$thumb_size  = "abc-size2-portfolio";
		}
		$thumb_size_full  = "full";
	} else {				
		$thumb_size  		= "full";	
		$thumb_size_full  	= "full";

}
$args = array(
	'post_type'         => "rainbow_projects",
	'posts_per_page' 	=> $settings['number'],
	'orderby'        	=> $settings['orderby'],
);
if ( !empty( $settings['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => "rainbow_projects_category",
			'field' => 'term_id',
			'terms' => $settings['cat'],
		)
	);
}
switch ( $settings['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}
$posts = get_posts( $args );
$uniqueid = time() . rand( 1, 99 );
$portfolio = array();
$cats    = array();
foreach ( $posts as $post ) {
	$cats_comma       = array();
	$img              = get_the_post_thumbnail_url( $post, $thumb_size );
	$imgfull          = get_the_post_thumbnail_url( $post, $thumb_size_full );
	$terms            = get_the_terms( $post, "rainbow_projects_category" );
	$terms            = $terms ? $terms : array();

	$terms_info       = '';
	$terms_comma_html = '';
	if ( !$terms ) {
		continue;
	}	
	foreach ( $terms as $term ) {
		$terms_info  .= " {$uniqueid}-{$term->slug}";		
		$cats_comma[] = $term->name;
		if ( !isset( $cats[$term->slug] ) ) {
			$cats[$term->slug] = $term->name;
		}		
		$terms_link  = get_term_link($term);
	}
	$portfolios[] = array(
		'id'       		 	 => $post->ID,
		'imgfull'       	 => $imgfull,
		'img'       		 => $img,
		'title'     		 => $post->post_title,
		'url'       		 => get_the_permalink( $post ),		
		'cats'       		 => $terms_info,
		'cats_comma' 		 => implode(", ", $cats_comma ),
		'cats_link' 		 => $terms_link,
	);
}

$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
?>

<div class="isotope-recent-area">
	<div class="isotope-wrap">
		<?php if($settings['filter'] == 'yes'){ ?>
			<div class="isotope-tab-button button-style-2">		
					<a class="nav-item current" href="#" data-filter="*" class="current"><?php esc_html_e( 'All', 'rainbow-elements' );?></a>
					<?php foreach ( $cats as $key => $value): ?>
						<?php $cat_filter = "{$uniqueid}-{$key}";?>
						<a class="nav-item" href="#" data-filter=".<?php echo esc_attr( $cat_filter );?>"><?php echo esc_html( $value );?></a>
					<?php endforeach; ?>		
			</div>
		<?php  } ?>

	 <div class="row isotope-container">
		<?php foreach ( $portfolios as $portfolio ): ?>
			<div class="<?php echo esc_attr( $col_class . $portfolio['cats'] );?>">
				<div class="project-grid project-style-2">
				    <div class="thumbnail">
				        <img src="<?php echo esc_url( $portfolio['img'] );?>" alt="<?php echo esc_html( $portfolio['title'] );?>">
				    </div>
				    <div class="content">
				        <ul class="list-unstyled entry-meta">
				            <li><?php echo rainbow_helper::get_projects_cat($portfolio['id']); ?></li>
				            <li class="price">$560</li>
				        </ul>
				        <h6 class="title"><a href="<?php echo esc_url($portfolio['url']);?>"><?php echo esc_html( $portfolio['title'] );?></a></h6>
				    </div>
				    <div class="hover-content">
				        <a href="<?php echo esc_url($portfolio['url']);?>" class="item-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
				    </div>
				</div>				
			</div>
		<?php endforeach;?>
	</div>             
</div>
</div>