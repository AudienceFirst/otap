<?php $var = $args['content'];?>
<section class="text-image-withtitle <?php if($var['07_padding_topbottom']) { echo $var['07_padding_topbottom']; } ?>">
    <div class="container">
        <div class="row <?php if($var['07_layout'] == "image_right") { echo "flexreverse"; } ?>">
            <!-- image & title -->
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                <?php if($var['07_title']) { ?>
                    <?php if($var['07_title_type']) { ?>
                        <?= "<" . $var['07_title_type'] . " class='title'>" ?><?= $var['07_title']; ?><?= "</" . $var['07_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['07_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['07_image']) { ?>
                    <img src="<?= $var['07_image']['url']; ?>" alt="<?= $var['07_image']['alt']; ?>"/>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-1"></div>

            <!-- content -->
            <div class="col-lg-5 col-md-12 col-sm-12 max-width-column">
                <?php if($var['07_textarea']) { ?>
                    <div class="textarea"><?= $var['07_textarea']; ?></div>
                <?php } ?>
                <?php if($var['07_button']) { ?>
                    <a href="<?= $var['07_button']['url'] ?>" class="btn ghost-btn" role="button" value="<?= $var['07_button']['title']; ?>"><span><?= $var['07_button']['title']; ?></span></a>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-1"></div>
            
        </div>
    </div>
</section>