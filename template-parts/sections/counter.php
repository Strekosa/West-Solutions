<section class="counter wrapper  ">

    <?php if (have_rows('counter')) : ?>
        <div class="counter__main container-boxed ">
            <?php while (have_rows('counter')) : the_row(); ?>
                <div class="counter__item ">
                    <?php if ($count_value = get_sub_field('count_value')) : ?>
                        <h3 class="counter__value"><span><?php echo $count_value; ?></span></h3>
                    <?php endif; ?>
                    <?php if ($count_title = get_sub_field('count_title')) : ?>
                        <h6 class="counter__title"><?php echo $count_title; ?></h6>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</section>
