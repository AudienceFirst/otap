<?php $var = $args['content']; 
$title = $var['015_posttype_slider_block_title'];
$postType = $var['015_posttype_slider_block_posttype'];
$postType_count = $var['015_posttype_slider_block_number'];



$args = array(
    'post_type' => $postType,
    'posts_per_page' => 6,
);
$query = new WP_Query($args);
$posttype_data = array();

if($query->have_posts()):
    while($query->have_posts()):
        $query->the_post();

        //echo get_the_ID() . "<br>";

        $data['id'] = get_the_ID();
        $data['title'] = get_the_title($post->ID);
        $data['date'] = get_the_date();
        $data['desc'] = "Verduurzaming binnen de logistieke sector: een enorme opgave met vele uitdagingen! Er zijn verschillende ...";
        $data['image'] = get_the_post_thumbnail_url($post->ID);
        $data['url'] = get_permalink($post->ID);
        array_push($posttype_data, $data);
    endwhile;
wp_reset_postdata();     
endif;




?>
<section class="posttype_slider_block_015 <?php if($var['015_padding_topbottom']) { echo $var['015_padding_topbottom']; } ?> <?php if($var['015_margin_topbottom']) { echo $var['015_margin_topbottom']; } ?>">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="title__container">
                    <?php if($title): ?>
                        <h2 class="title"><?= $title; ?></h2>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if($postType): ?>
                    <history-slider
                    historymarks='<?php echo json_encode($posttype_data); ?>'
                    ></history-slider>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
