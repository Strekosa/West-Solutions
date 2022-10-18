<section class="service wrapper container-boxed flex column align-center">
    <div class="service__header section-header ">

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

    <div class="service__main w-100">
        <div class="service__image flex justify-center">

            <?php
            $image = get_sub_field('image');
            if ($image): ?>
                <div class="service__image-inner">
                    <img src="<?php echo esc_url($image['url']); ?>"
                         alt="<?php echo esc_attr($image['alt']); ?>"/>
                </div>
            <?php endif; ?>

        </div>
        <div class="service__accordion ">
            <?php if (have_rows('accordion')): ?>

                <ul class="accordion-list ">

                    <?php while (have_rows('accordion')): the_row();
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $text = get_sub_field('description');
                        ?>

                        <li>
                            <div class="question flex align-center justify-between">
                                <div class="flex  w-100">
                                    <?php
                                    if ($icon) : ?>
                                        <div class="question-icon flex align-center justify-between">
                                            <img src="<?php echo esc_url($icon ['url']); ?>"
                                                 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    if ($title) : ?>
                                        <h6 class="question-title flex justify-between align-center w-100"> <?php echo $title; ?></h6>
                                    <?php endif; ?>

                                </div>

                            </div>
                            <div class="answer">
                                <div class="scroll">
                                <?php echo $text; ?>
                                </div>
                            </div>
                        </li>
                    <?php
                    endwhile; ?>
                </ul>

            <?php endif; ?>

            <!--            --><?php //if (have_rows('accordion')): ?>
            <!---->
            <!--                <div class="accordion" id="accordionExample">-->
            <!---->
            <!--                    --><?php //while (have_rows('accordion')): the_row();
            //
            //                        $title = get_sub_field('title');
            //                        $text = get_sub_field('description');
            //                        ?>
            <!---->
            <!--                        <div class="card">-->
            <!--                            <div class="card-header flex align-center justify-between">-->
            <!--                                <h5 class="mb-0">--><?php //echo $title; ?><!--</h5>-->
            <!--                                <button class="btn btn-link" type="button" data-toggle="collapse"-->
            <!--                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
            <!--                                    <svg class="style-initial close" width="14" height="14" viewBox="0 0 14 14"-->
            <!--                                         fill="none" xmlns="http://www.w3.org/2000/svg">-->
            <!--                                        <path d="M7 0V14M0 7H14" stroke="#A3303A" stroke-width="2"/>-->
            <!--                                    </svg>-->
            <!--                                </button>-->
            <!--                            </div>-->
            <!--                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"-->
            <!--                                 data-parent="#accordionExample">-->
            <!--                                <div class="card-body">-->
            <!--                                    --><?php //echo $text; ?>
            <!--                                </div>-->
            <!--                            </div>-->
            <!---->
            <!--                        </div>-->
            <!--                    --><?php
            //                    endwhile; ?>
            <!--                </div>-->
            <!---->
            <!--            --><?php //endif; ?>
        </div>


    </div>
</section>