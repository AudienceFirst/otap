<?php $var = $args['content'];?>
<section class="header_02_image" style="background-image: url('<?= $var['02_header_image']['url']; ?>');">
    <div class="container">
        <div class="row">
            NAVIGATIE
        </div>
    </div>
</section>
<section class="header_02 <?php if($var['02_header_padding_topbottom']) { echo $var['02_header_padding_topbottom']; } ?> <?php if ($var['02_header_margin_topbottom']) { echo $var['02_header_margin_topbottom'];} ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                <?php if($var['02_header_title_sub']) { ?>
                    <p class="chapeau"><?= $var['02_header_title_sub']; ?></p>
                <?php } ?>
                <?php if($var['02_header_title']) { ?>
                    <?php if($var['02_header_title_type']) { ?>
                        <?= "<" . $var['02_header_title_type'] . ">" ?><?= $var['02_header_title']; ?><?= "</" . $var['02_header_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['02_header_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['02_header_textarea_left']) { ?>
                    <div class="subtitle"><?= $var['02_header_textarea_left']; ?></div>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 intro-column">
                <?php if($var['02_header_textarea_right']) { ?>
                    <div class="intro-text"><?= $var['02_header_textarea_right']; ?></div>
                <?php } ?>
                <?php if($var['02_header_button']) { ?>
                    <a href="<?= $var['02_header_button']['url'] ?>" class="btn ghost-btn" role="button" value="<?= $var['02_header_button']['title']; ?>"><span><?= $var['02_header_button']['title']; ?></span></a>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>
        </div>
    </div>
</section>  