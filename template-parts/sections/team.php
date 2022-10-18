<section class="team wrapper container-boxed flex column align-center">
    <div class="team__main flex column align-center">
        <div class="team__header section-header  ">

            <?php
            $subtitle = get_sub_field('subtitle');
            if ($subtitle) : ?>
                <h3 class="section-subtitle"> <?php echo $subtitle; ?></h3>
            <?php endif; ?>

            <?php
            $title = get_sub_field('title');
            if ($title) : ?>
                <h2 class="section-title"> <?php echo $title; ?></h2>
            <?php endif; ?>

            <?php
            $description = get_sub_field('description');
            if ($description) : ?>
                <p class="section-description"> <?php echo $description; ?></p>
            <?php endif; ?>

        </div>

        <?php

        $arg = array(
            'post_type' => 'team',
            'order' => 'DESC',
            'post_per_page' => -1,
            'hide_empty' => true,
        );

        $the_query = new WP_Query($arg);
        if ($the_query->have_posts()) : ?>
            <article class="team__all w-100-m-down">
                <?php
                $i = 1;
                while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                ?><!-- BEGIN of Post -->

                <article class="team__item flex column align-center">
                    <div class="team__inner pos-rel w-100-m-down">
                        <div class="team__img w-100-m-down">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php if (have_rows('socials')): ?>
                            <div class="team__socials flex justify-center pos-centr">
                                <?php while (have_rows('socials')): the_row();
                                    $icon = get_sub_field('icon');
                                    $link = get_sub_field('link');
                                    ?>
                                    <?php if ($link):
                                        $link_url = $link['url'];
                                        ?>
                                        <a class="team__social flex align-center justify-center"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="_blank">
                                            <span aria-hidden="true" class="fab fa-<?php echo $icon; ?>"></span>
                                        </a>
                                    <?php else: ?>
                                        <div class="team__social flex align-center justify-center">
                                            <span aria-hidden="true" class="fab fa-<?php echo $icon; ?>"></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h6 class="team__name"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h6>
                    <?php
                    $prof = get_field('profession');
                    if ($prof) : ?>
                    <p class="team__profession"> <?php echo $prof; ?></p>
                    <?php endif; ?>

                </article>
                <?php
                $i++;
                if ($i > 3) {
                    break;
                }
                endwhile; ?><!-- END of Post -->

            </div><!-- END of .post-type -->
        <?php
            $count_team = wp_count_posts('team');
            $published_team = $count_team->publish;
            $button = get_sub_field('link');
            if ($count_team) :
                if ($published_team > 3) :
                    if ($button= get_sub_field('link')):
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>
                        <a class="team__button button flex align-center justify-center "
                           href="<?php echo esc_url($button_url); ?>"
                           target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?>
                        </a>
                    <?php endif;
                endif;
            endif;

        endif;
        wp_reset_query(); ?>
    </div>

</section>