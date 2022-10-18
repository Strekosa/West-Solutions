
<section class="hero">

    <?php if (have_rows('slider')): ?>
        <div class="hero__main hero-slider slick-slider">
            <?php while (have_rows('slider')): the_row();
                $image = get_sub_field('slide_image');
                $title = get_sub_field('slide_title');
                $subtitle = get_sub_field('slide_subtitle');
                $button = get_sub_field('slide_link');
                $dot_title = get_sub_field('dot_title');
                ?>
                <div class="hero__image pos-rel " data-title="<?php echo $dot_title; ?>">

                    <img src="<?php echo esc_url($image ['url']); ?>"
                         alt="<?php echo esc_attr($image ['alt']); ?>"/>
                    <div class="hero__text pos-centr flex column align-center">
                        <?php
                        if ($subtitle) : ?>
                            <h2 class="hero__text-subtitle"> <?php echo $subtitle; ?></h2>
                        <?php endif; ?>

                        <?php
                        if ($title) : ?>
                            <h1 class="hero__text-title flex column align-center text-center"> <?php echo $title; ?></h1>
                        <?php endif; ?>

                        <?php
                        if ($button):
                            $button_url = $button['url'];
                            $button_title = $button['title'];
                            $button_target = $button['target'] ? $button['target'] : '_self';
                            ?>
                            <a class="hero__text-button button flex align-center justify-center "
                               href="<?php echo esc_url($button_url); ?>"
                               target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                        <?php endif; ?>

                    </div>

                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</section>