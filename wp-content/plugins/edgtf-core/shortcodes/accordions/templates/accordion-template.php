<<?php echo esc_attr($title_tag) ?> class="clearfix edgtf-title-holder">
    <?php if ($number !== '') { ?>
        <span class="edgtf-accordion-number"><?php echo esc_attr($number) ?></span>
    <?php } ?>
    <div class="event-wrapper">
        <div class="inner-event-wrapper left">
            <div class="edgtf-tab-title">
                <span class="edgtf-tab-title-inner">
                    <?php echo esc_attr($title) ?>
                </span>
            </div>
        </div>
        <div class="inner-event-wrapper center">
            <div class="edgtf-accordion-mark">
                <span class="edgtf-accordion-mark-icon">
                    <span class="edgtf_icon_plus arrow_carrot-up"></span>
                    <span class="edgtf_icon_minus arrow_carrot-down"></span>
                </span>
            </div>
        </div>
        <div class="inner-event-wrapper right">
            <hr class="events-vert-rule" />
        </div>
</<?php echo esc_attr($title_tag) ?>>
<div class="edgtf-accordion-content">
    <div class="edgtf-accordion-content-inner">
        <?php echo do_shortcode($content); ?>
    </div>
</div>