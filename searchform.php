<?php
/**
 * Searchform
 *
 * Custom template for search form
 */
?>
<!-- BEGIN of search form -->
<form method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">

    <input type="search" name="s" id="s" class="search-field pos-rel" placeholder="Search"
           value="<?php echo get_search_query(); ?>"/>
    <button type="submit">
        <svg  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3168 14.9828C17.6153 15.2815 17.7999 15.6939 17.7999 16.1499C17.7999 17.0612 17.0612 17.7997 16.15 17.7997C15.6943 17.7997 15.2818 17.615 14.9832 17.3164L10.1475 12.4806C9.16513 13.0612 8.02346 13.3997 6.79999 13.3997C3.15491 13.3997 0.199944 10.4451 0.199944 6.79972C0.199944 3.1549 3.15491 0.199692 6.79999 0.199692C10.445 0.199692 13.3999 3.1549 13.3999 6.79972C13.3999 8.02339 13.0612 9.16483 12.4809 10.1471L17.3168 14.9828ZM6.79999 1.84955C4.06611 1.84955 1.84995 4.06564 1.84995 6.79972C1.84995 9.53377 4.06611 11.7499 6.79999 11.7499C9.53374 11.7499 11.7499 9.53377 11.7499 6.79972C11.7499 4.06564 9.53374 1.84955 6.79999 1.84955Z" fill="black"/>
        </svg>
    </button>

</form>
<!-- END of search form -->
