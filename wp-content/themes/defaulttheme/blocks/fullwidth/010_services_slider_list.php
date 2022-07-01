<?php $var = $args['content'];?>
<section class="services_slider_list_10 <?php if($var['010_padding_topbottom']) { echo $var['010_padding_topbottom']; } ?> <?php if($var['010_margin_topbottom']) { echo $var['010_margin_topbottom']; } ?>">
    <?php if($var['services_list']) : ?>

        <?php 
        $slides = $var['services_list']; 
        $slidesWithActive = array();

        foreach($slides as $key => $slide) {
            $slidesWithActive[$key]['services_list_image'] = $slide['services_list_image'];
            $slidesWithActive[$key]['services_list_title'] = $slide['services_list_title'];
            $slidesWithActive[$key]['active'] = false;
        }
        ?>
        <services-list-slideshow
        titletext='<?= $var['010_title']; ?>'
        data='<?= json_encode($slidesWithActive); ?>'
        ></services-list-slideshow>

    <?php endif; ?>
</section>