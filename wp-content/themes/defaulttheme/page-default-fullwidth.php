<?php
/* Template Name: Template (Fullwidth) */
get_header();
?>

<?php get_the_content_blocks(get_the_ID(), 'headers', 'blocks/headers/'); ?>
<?php get_the_content_blocks(get_the_ID(), 'fullwidth_blocks', 'blocks/fullwidth/'); ?>


<?php get_footer(); ?>