<?php
get_header();
?>

<main id="primary" class="site-main">
    <section class="wrapper">
        <div class="container">
            <div class="all-posts flex flex-wrap">
                <?php
                if (have_posts()) :
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        echo '<article class="single-post-card">
					<h3 class="title">' . get_the_title() . '</h3>
					<p class="content">' . wp_trim_words(get_the_content(), 25, '...') . '</p>
					<div class="singe-post-date">Date posted: <time>' . get_the_date() . '</time></div>
					<a href="' . get_post_permalink() . '" class="button">Read More</a>
				</article>';

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?></div>
        </div>
    </section>


</main><!-- #main -->