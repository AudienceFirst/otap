<?php $var = $args['content'];?>
<section class="cta_with_images_012 <?php if($var['012_padding_topbottom']) { echo $var['012_padding_topbottom']; } ?> <?php if($var['012_margin_topbottom']) { echo $var['012_margin_topbottom']; } ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 cta-row">
                <div class="image">
                    <?php if($var['012_image']) { ?>
                        <img src="<?= $var['012_image']['url']; ?>" alt="<?= $var['012_image']['alt']; ?>"/>
                    <?php } ?>
                </div>
                <div class="space">
                </div>
                <div class="text">
                    <?php if($var['012_title']) { ?>
                        <?php if($var['012_title_type']) { ?>
                            <?= "<" . $var['012_title_type'] . " class='title'>" ?><?= $var['012_title']; ?><?= "</" . $var['012_title_type'] . ">" ?>
                        <?php } else { ?>
                            <h2><?= $var['012_title']; ?></h2>
                        <?php } ?>
                    <?php } ?>
                    <?php if($var['012_tag_line']) { ?>
                        <p class='bodytext'><?= $var['012_tag_line']; ?></p>
                    <?php } ?>
                </div>
                <div class="cta-btn">
                    <?php if($var['012_button']) { ?>
                        <a href="<?= $var['012_button']['url'] ?>" class="btn ghost-btn" role="button" value="<?= $var['012_button']['title']; ?>"><span><?= $var['012_button']['title']; ?></span></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
        </div>
    </div>
</section>