<?php $var = $args['content'];?>
<section class="text-image <?php if($var['01_padding_topbottom']) { echo $var['01_padding_topbottom']; } ?>">
    <div class="container">
        <div class="row <?php if($var['01_layout'] == "image_right") { echo "flexreverse"; } ?>">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <?php if($var['01_image']) { ?>
                    <img src="<?= $var['01_image']['url']; ?>" alt="<?= $var['01_image']['alt']; ?>"/>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 max-width-column">
                <?php if($var['01_title']) { ?>
                    <?php if($var['01_title_type']) { ?>
                        <?= "<" . $var['01_title_type'] . " class='title'>" ?><?= $var['01_title']; ?><?= "</" . $var['01_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['01_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['01_textarea']) { ?>
                    <p class='subtitle'><?= $var['01_textarea']; ?></p>
                <?php } ?>
                <?php if($var['01_button']) { ?>
                    <a href="<?= $var['01_button']['url'] ?>" class="btn ghost-btn" role="button" value="<?= $var['01_button']['title']; ?>"><span><?= $var['01_button']['title']; ?></span></a>
                <?php } ?>
            </div>
            
        </div>
    </div>
</section>