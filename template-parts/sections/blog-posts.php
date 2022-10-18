<section class="blog-posts wrapper container-boxed flex column align-center">
    <div class="blog-posts__main flex column align-center">
        <div class="blog-posts__header section-header ">

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

        </div>

        <?php

        $arg = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'post_per_page' => -1,
            'hide_empty' => true,
        );

        $the_query = new WP_Query($arg);
        if ($the_query->have_posts()) : ?>
            <div class="blog-posts__all w-100-m-down">
                <?php
                $i = 1;
                while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $date = get_the_date();
                ?><!-- BEGIN of Post -->


                <article class="blog-posts__item flex column w-100-m-down">

                    <div class="blog-posts__header pos-rel ">
                        <a href="<?php the_permalink(); ?>" class="blog-posts__img">

                            <?php the_post_thumbnail(); ?>

                        </a>
                        <div class="blog-posts__date flex column align-center justify-center">
                            <p class="blog-posts__date-day"><?php echo date(" j", strtotime($date)); ?></p>
                            <p class="blog-posts__date-month"><?php echo date("M", strtotime($date)); ?></p>
                        </div>

                    </div>
                    <a href="<?php the_permalink(); ?>" class="blog-posts__content ">

                        <h6><?php the_title(); ?></h6>
                        <?php the_content(); ?>

                    </a>

                    <div class="blog-posts__info flex align-center">
                        <i class="fa-solid fa-eye"></i>
                        <p class="blog-posts__info-views"><?php echo getPostViews(get_the_ID()); ?></p>
                        <i class="fa-solid fa-comment-dots"></i>
                        <p class="blog-posts__info-comments"><?php echo $comments_number = get_comments_number(); ?></p>
                    </div>

                </article>


                <?php
                $i++;
                if ($i > 3) {
                    break;
                }
                endwhile; ?><!-- END of Post -->

            </div><!-- END of .post-type -->

            <?php
            $count_posts = wp_count_posts();
            if ($count_posts) {
                $published_posts = $count_posts->publish;
                if ($published_posts > 3) {
                    $button = get_sub_field('button');
                    if ($button):
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>
                        <a class="blog-posts__button button flex align-center justify-center "
                           href="<?php echo esc_url($button_url); ?>"
                           target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?>
                        </a>
                    <?php endif;
                }
            }
        endif;
        wp_reset_query(); ?>

    </div>

</section>
