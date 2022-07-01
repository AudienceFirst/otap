<?php $var = $args['content'];?>

<?php
if($var['01_header_background_height']) {
    $firstheight = $var["01_header_background_height"];
    $secondheight = 100 - $firstheight;
}
?>
<section class="header_01 <?php if($var['01_header_padding_topbottom']) { echo $var['01_header_padding_topbottom']; } ?> <?php if ($var['01_header_margin_topbottom']) { echo $var['01_header_margin_topbottom'];} ?>" style="background: linear-gradient(to bottom, <?= $var["01_header_background_color_1"]; ?> <?= $var["01_header_background_height"]; ?>%, <?= $var["01_header_background_color_2"]; ?> <?= $secondheight; ?>%)">
    <div class="container">
        <div class="row <?php if($var['01_header_layout'] == "image_right") { echo "flexreverse"; } ?>">
            <div class="col-lg-1 col-md-1 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                  <img src="<?= $var['01_header_image']['url']; ?>" />
                </div>
            <div class="col-lg-1 col-md-1 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 max-width-column">
                <?php if($var['01_header_title']) { ?>
                    <?php if($var['01_header_title_type']) { ?>
                        <?= "<" . $var['01_header_title_type'] . ">" ?><?= $var['01_header_title']; ?><?= "</" . $var['01_header_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['01_header_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['01_header_textarea']) { ?>
                    <p class="subtitle"><?= $var['01_header_textarea']; ?></p>
                <?php } ?>
                <?php if($var['01_header_button']) { ?>
                    <a href="<?= $var['01_header_button']['url'] ?>" class="btn btn-secondary" role="button" value="<?= $var['01_header_button']['title']; ?>"><span><?= $var['01_header_button']['title']; ?></span></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>