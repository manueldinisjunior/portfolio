<?php
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$innto_video_enable  = (isset($rainbow_options['rainbow_enable_intro_video'])) ? $rainbow_options['rainbow_enable_intro_video'] : 'no';
$innto_video_greeting  = (isset($rainbow_options['rainbow_intro_greeting_message'])) ? $rainbow_options['rainbow_intro_greeting_message'] : 'Hello';
$innto_video_url  = (isset($rainbow_options['rainbow_intro_video_url'])) ? $rainbow_options['rainbow_intro_video_url'] : '';
$innto_video_poster  = (isset($rainbow_options['rainbow_intro_video_poster'])) ? $rainbow_options['rainbow_intro_video_poster'] : '';
$innto_video_position  = (isset($rainbow_options['rainbow_intro_video_position'])) ? $rainbow_options['rainbow_intro_video_position'] : 'right';
$intro_video_close_sound  = (isset($rainbow_options['intro_video_close_sound']['url'])) ? $rainbow_options['intro_video_close_sound']['url'] : '';

?>

<div class="rbt-intro-video-card-wrapper position-<?php echo esc_attr($innto_video_position); ?>">
    <div class="rbt-video-inner">
        <div class="rbt-video-progress-container">
            <video class="rbt-video-element" id="rbt-video-element" poster="<?php echo esc_url($innto_video_poster['url']); ?>">
                <source src="<?php echo esc_url($innto_video_url['url']); ?>">
            </video>

            <div class="rbt-video-controls">
                <div class="play-button" title="<?php echo esc_html__('Play/Pause (Spacebar)', 'inbio') ?>">
                    <i class="feather-play"></i>
                </div>
                <div class="sound-button" title="<?php echo esc_html__('Mute/Unmute (m)', 'inbio') ?>">
                    <i class="feather-volume-2"></i>
                </div>
                <div class="expand-icon" title="<?php echo esc_html__('Expand', 'inbio') ?>">
                    <i class="feather-maximize-2"></i>
                </div>
            </div>

            <div class="rbt-iv-top-wrapper">
                <div class="rbt-iv-progress-bar">
                    <span class="buffer-bar"></span>
                    <span class="time-bar"></span>
                </div>
            </div>

        </div>

        <?php if (!empty($innto_video_greeting)) { ?>
        <div class="card-greeting">
            <p><?php echo esc_html($innto_video_greeting); ?></p>
        </div>
    <?php } ?>
    </div>
    <div class="rbt-iv-close-button">
        <?php if(!empty($intro_video_close_sound )) { ?>
        <audio id="rbt-close-button-audio" preload="auto">
            <source src="<?php echo esc_url($intro_video_close_sound); ?>" type="audio/mpeg">
            <source src="<?php echo esc_url($intro_video_close_sound); ?>" type="audio/ogg">
        </audio>
        <?php } ?>
        <i class="feather-x"></i>
    </div>
</div>
