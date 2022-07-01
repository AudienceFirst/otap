<?php $var = $args['content']; ?>
<section id="<?php if($var['011_anchor_target']) { echo $var['011_anchor_target']; }?>" class="services_slider_sub_block_011 <?php if($var['011_padding_topbottom']) { echo $var['011_padding_topbottom']; } ?> <?php if($var['011_margin_topbottom']) { echo $var['011_margin_topbottom']; } ?>">
    <div class="container">
        <div class="row <?php if($var['011_layout'] == "image_right") { echo "flexreverse"; } ?>">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <?php if($var['011_image']) { ?>
                    <figure><img src="<?= $var['011_image']['url']; ?>" alt="<?= $var['011_image']['alt']; ?>"/></figure>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <?php if($var['011_title']) { ?>
                    <?php if($var['011_title_type']) { ?>
                        <?= "<" . $var['011_title_type'] . " class='title'>" ?><?= $var['011_title']; ?><?= "</" . $var['011_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['011_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['011_textarea']) { ?>
                    <p class='bodytext'><?= $var['011_textarea']; ?></p>
                <?php } ?>
                <?php if($var['011_button']) { ?>
                    <a href="<?= $var['011_button']['url'] ?>" class="btn ghost-btn" role="button" value="<?= $var['011_button']['title']; ?>"><span><?= $var['011_button']['title']; ?></span></a>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>
            
        </div>
    </div>
</section>