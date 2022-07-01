<?php $var = $args['content'];?>
<section class="timeline_horizontal_09 <?php if($var['09_padding_topbottom']) { echo $var['09_padding_topbottom']; } ?> <?php if($var['09_margin_topbottom']) { echo $var['09_margin_topbottom']; } ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if($var['09_title']) { ?>
                    <?php if($var['09_title_type']) { ?>
                        <?= "<" . $var['09_title_type'] . ">" ?><?= $var['09_title']; ?><?= "</" . $var['09_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['09_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <?php foreach($var['09_timeline_list'] as $timeline_item) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <?php if($timeline_item['09_timeline_list_title']) { ?>
                        <div class="timeline_title"><?= $timeline_item['09_timeline_list_title']; ?></div>
                        <div class="timeline_sub_title"><?= $timeline_item['09_timeline_list_sub_title']; ?></div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>