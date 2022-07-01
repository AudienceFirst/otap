<?php
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
                <?php get_the_content_blocks_single(get_the_ID(), 'single_blocks'); ?>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar <?php if($sidebar_layout == "sidebar3") { echo 'extra-margin-bottom'; } ?>">
                <?php if($sidebar_layout == "sidebar1") {
                    wpz_list_child_pages();
                } else {
                    wpz_sidebars_options($sidebar_layout);
                } ?>
            </div>
        </div>
    </div>
</section>

<section class="devider">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
            <div class="devider-style" style="background-image: url('/wp-content/uploads/2022/03/devider.svg');"></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 content-part">

            <?php
                $related_title = "Nog niet uitgelezen? Neem eens een kijkje tussen onze ";
                $related_title .= "<a href='#'>nieuwsberichten.</a>";

                example_cats_related_post($related_title);
            ?>

            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>