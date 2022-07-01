<?php $var = $args['content']; ?>

<section class="header_03  <?php if($var['03_header_padding_topbottom']) { echo $var['03_header_padding_topbottom']; } ?> <?php if ($var['03_header_margin_topbottom']) { echo $var['03_header_margin_topbottom'];} ?>" style="background-image: url('<?= $var['03_header_image']['url']; ?>')">
    <div class="container">
        <div class="row bg-image">
        </div>
        <div class="row overlay <?php if($var['03_header_layout'] == "text_block_right") { echo "flexreverse"; } ?>" >
            <div class="col-lg-5 col-md-8 col-sm-12 text-block">
                <?php if($var['03_header_title']) { ?>
                    <?php if($var['03_header_title_type']) { ?>
                        <?= "<" . $var['03_header_title_type'] . " class='title'>" ?><?= $var['03_header_title']; ?><?= "</" . $var['03_header_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2 class='title'><?= $var['03_header_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['03_header_textarea']) { ?>
                    <p class='subtitle'><?= $var['03_header_textarea']; ?></p>
                <?php } ?>
                <?php if($var['03_header_button']) { ?>
                    <a href="<?= $var['03_header_button']['url'] ?>" class="btn btn-primary" role="button" value="<?= $var['03_header_button']['title']; ?>"><span><?= $var['03_header_button']['title']; ?></span></a>
                <?php } ?>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12">
            </div>
        </div>
    </div>
</section>