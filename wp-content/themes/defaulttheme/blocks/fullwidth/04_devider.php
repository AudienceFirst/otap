<?php $var = $args['content']; ?> 
<section class="devider <?php if($var['04_padding_topbottom']) { echo $var['04_padding_topbottom']; } ?> <?php if($var['04_margin_topbottom']) { echo $var['04_margin_topbottom']; } ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                <div class="devider-style" style="background-image: url(<?= $var['04_devider_image']['url'] ?>)"></div>
            </div>
        </div>
    </div>
</section>