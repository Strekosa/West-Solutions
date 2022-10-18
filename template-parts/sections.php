<?php

// Check value exists.
if( have_rows('page_engine') ):

    // Loop through rows.
    while ( have_rows('page_engine') ) : the_row();

        // Case: Hero layout.
        if( get_row_layout() == 'hero' ):
            get_template_part('template-parts/sections/hero');

        // Case: Spacer layout.
        elseif( get_row_layout() == 'spacer' ):
            get_template_part('template-parts/sections/spacer');
        // Do something...

        // Case: Blog Posts layout.
        elseif( get_row_layout() == 'blog_posts' ):
            get_template_part('template-parts/sections/blog-posts');
        // Do something...

        // Case: Service layout.
        elseif( get_row_layout() == 'service' ):
            get_template_part('template-parts/sections/service');
            // Do something...

        // Case: Team layout.
        elseif( get_row_layout() == 'team' ):
            get_template_part('template-parts/sections/team');
            // Do something...

        // Case: Team layout.
        elseif( get_row_layout() == 'counter' ):
            get_template_part('template-parts/sections/counter');
            // Do something...

        endif;

        // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;


