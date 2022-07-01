<?php
/* Template Name: Template (Sidebar) */
get_header();
$featuredImage  = get_the_post_thumbnail_url($post->ID); //featured img
$sidebar_layout = get_field( "sidebar_layout" );
?>

<section class="default-page-header" style="background: url('<?php echo $featuredImage; ?>') no-repeat; background-size: cover; background-position: center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12"></div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 content-part">
                <?php get_the_content_blocks(get_the_ID(), 'single_blocks', 'blocks/single/'); ?>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar">
                <?php if($sidebar_layout == "sidebar1") {
                    wpz_list_child_pages();
                } else {
                    wpz_sidebars_options($sidebar_layout);
                } ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>