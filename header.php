<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Example
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#83303A">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">

    <script src="https://kit.fontawesome.com/407c2044d0.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- NOSCRIPT -->
    <noscript>
        Your Browser Does Not Support JavaScript. Please Update Your Browser and reload page. Have a nice day!
    </noscript>

    <title>MOGO</title>

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header>
        <div class="header-main">
            <div class="flex container-boxed justify-between  align-center">
                <!-- .site-branding -->
                <div class="site-branding flex align-center">
                    <?php the_custom_logo(); ?>
                </div>

                <div class="flex align-center">
                    <button class="nav-tgl show-on-mobile" type="button" aria-label="toggle menu">
                        <!-- Three dividers in the hamburger button--><span aria-hidden="true"></span>
                    </button>
                    <nav class="header-menu">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'menu_class' => 'menu flex',

                        )); ?>
                    </nav>
                    <div class="header-search flex">
                        <div class="basket flex align-center">
                            <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.726 3.66288L17.7273 3.66348L15.2524 9.1632H15.2522C15.1301 9.4344 14.8661 9.62753 14.5548 9.64779L7.42723 10.1228L7.83898 11.2994H15.6C16.5112 11.2994 17.2499 12.0385 17.2499 12.9499C17.2499 13.8612 16.5112 14.5997 15.6 14.5997C14.6887 14.5997 13.9499 13.8612 13.9499 12.9499H6.24998C6.24998 13.8612 5.51126 14.5997 4.59997 14.5997C3.68867 14.5997 2.94997 13.8612 2.94997 12.9499C2.94997 12.0385 3.68867 11.2994 4.59997 11.2994H6.09091L2.9147 2.22462H1.02496C0.569358 2.22462 0.199944 1.85508 0.199944 1.3997C0.199944 0.94431 0.569358 0.57477 1.02496 0.57477H3.49996C3.85988 0.57477 4.16291 0.806625 4.27552 1.12849L4.27862 1.12731L4.75904 2.50001H16.9749C17.4306 2.50001 17.7999 2.86894 17.7999 3.32493C17.7999 3.44533 17.7726 3.55917 17.726 3.66288ZM5.33651 4.14986L6.86167 8.50695L13.9509 8.03428L15.699 4.14986H5.33651Z" fill="white"/>
                            </svg>

                        </div>
                        <div class="search pos-rel flex align-center">
                            <button class="search-toggle flex align-center justify-center ">

                                <svg class="search-open" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3168 14.9828C17.6153 15.2815 17.7999 15.6939 17.7999 16.1499C17.7999 17.0612 17.0612 17.7997 16.15 17.7997C15.6943 17.7997 15.2818 17.615 14.9832 17.3164L10.1475 12.4806C9.16513 13.0612 8.02346 13.3997 6.79999 13.3997C3.15491 13.3997 0.199944 10.4451 0.199944 6.79972C0.199944 3.1549 3.15491 0.199692 6.79999 0.199692C10.445 0.199692 13.3999 3.1549 13.3999 6.79972C13.3999 8.02339 13.0612 9.16483 12.4809 10.1471L17.3168 14.9828ZM6.79999 1.84955C4.06611 1.84955 1.84995 4.06564 1.84995 6.79972C1.84995 9.53377 4.06611 11.7499 6.79999 11.7499C9.53374 11.7499 11.7499 9.53377 11.7499 6.79972C11.7499 4.06564 9.53374 1.84955 6.79999 1.84955Z" fill="white"/>
                                </svg>
                                <svg class="search-close" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.29167 2L16 16M16 2L2 16" stroke="white" stroke-width="2.1"
                                          stroke-linecap="round"/>
                                </svg>
                            </button>
                            <?php echo get_search_form(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </header>
