<?php 
/*
* Template for the 404 Page
*
 */
get_header();?>

<div class="404-page black-bg pt-5">
    <div class="container d-flex align-items-center justify-content-center pt-5">
        <h1 class="white-text">404: This page does not exist</h1>
        <a class="primary-text h4" href="<?php echo get_home_url(); ?>">Go Back</a>
    </div>
</div>

<?php get_footer(); ?>