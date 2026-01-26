<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
$i = "";
$i == 1;
?>
<div class="rn-project-area portfolio-style-two pt-0 pb-0">
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true" id="carouselExampleControls" class="carousel slide mt-0" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ( $settings['list_project'] as $project ):
                $allowed_tags = wp_kses_allowed_html( 'post' );
                $title  			= $project['title'];
                $designation  	  = $project['designation'];
                $content  			= $project['content']; 
                $size 				= $project['project_image_size_size'];
                $img 				= wp_get_attachment_image( $project['project_image']['id'], $size );
                $inner_active       =  $i == 1 ? ' active': null;
              
                ?>
                <div class="carousel-item <?php echo esc_attr($inner_active);?>">
                    <div class="portfolio-single">
                        <div class="row direction">
                            <div class="col-lg-5">
                                <div class="inner">
                                    <h4 class="title mb--20">
                                        <?php echo esc_html($title);?>
                                    </h4>
                                    <p class="discription">
                                        <?php echo esc_html($designation);?>
                                    </p>
                                    <div class="ft-area">
                                        <div class="feature-wrapper">
                                            <?php echo wp_kses( $content, $allowed_tags ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-xl-7">

                                <?php if ($img) { ?>
                                    <div class="thumbnail">
                                        <?php echo wp_kses_post($img);?>
                                    </div>
                                <?php }else{ ?>
                                    <div class="thumbnail">
                                        <img src="<?php echo esc_url(  $project['project_image']['url'] );?>"  alt="<?php echo esc_html__( 'thumbnail', 'rainbow-elements' ); ?>">
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php  
                $i++;
                endforeach;
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <i class="feather-arrow-left"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <i class="feather-arrow-right"></i>
        </a>
    </div>
</div>
