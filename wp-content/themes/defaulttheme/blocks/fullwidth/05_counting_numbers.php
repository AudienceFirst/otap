<?php $var = $args['content']; ?>
<section class="counting-numbers <?php if ($var['05_padding_topbottom']) { echo $var['05_padding_topbottom'];} ?> <?php if ($var['05_margin_topbottom']) { echo $var['05_margin_topbottom'];} ?>">          
    <div class="container">
        <div class="row">
            <?php if ($var['05_title']) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                    <?php if ($var['05_title_type']) { ?>
                        <?= "<" . $var['05_title_type'] . ">" ?><?= $var['05_title']; ?><?= "</" . $var['05_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['05_title']; ?></h2>
                    <?php } ?>
                    <?php if ($var['05_textarea']) { ?>
                        <div class="textarea"><?= $var['05_textarea']; ?></div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="row counting-wrapper">
            <?php foreach ($var['05_counting_column'] as $counting) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12 single-counting">
                    <?php if ($counting['05_counting_image']) { ?>
                        <img src="<?= $counting['05_counting_image']['url']; ?>" alt="<?= $counting['05_counting_image']['alt']; ?>" />
                    <?php } ?>
                    <?php if ($counting['05_counting_title']) { ?>
                        <div class="number-wrapper">
                            <number-counter numberto="<?= $counting['05_counting_title']; ?>"></number-counter>
                            <?php if ($counting['05_counting_title_sub']) { ?>
                                <sup><?= $counting['05_counting_title_sub']; ?></sup>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if ($counting['05_counting_desc']) { ?>
                        <div class="counting-description"><?= $counting['05_counting_desc']; ?></div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>