<?php $var = $args['content']; ?> 
<section class="big-tag-text <?php if($var['03_padding_topbottom']) { echo $var['03_padding_topbottom']; } ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-nd-1 col-sm-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 content-column">
                <?php if($var['03_tag_text']) { ?>
                    <?php if($var['03_tag_type']) { ?>
                        <?= "<" . $var['03_tag_type'] . ">" ?><?= $var['03_tag_text']; ?><?= "</" . $var['03_tag_type'] . ">" ?>
                    <?php } else { ?>
                        <h2 class="big-title"><?= $var['03_tag_text']; ?></h2>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-nd-1 col-sm-1"></div>
        </div>
    </div>
</section>