<?php $var = $args['content'];?>
<section class="single_title_02 <?php if($var['02_single_padding_topbottom']) { echo $var['02_single_padding_topbottom']; } ?> <?php if ($var['02_single_margin_topbottom']) { echo $var['02_single_margin_topbottom'];} ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 header-part">
                <?php if ( is_single() ) { ?>
                    <p class="date"><?= get_the_date(); ?></p>
                <?php } else { ?>
                    <!-- NO CONTENT -->
                <?php } ?>
                <h1><?= $var['02_single_title_intro_in_column_title']; ?></h1>
                <p class="subtitle"><?= $var['02_single_title_intro_in_column_intro']; ?></p>
                <div class="intro"><?= $var['02_single_title_intro_in_column_intro_text']; ?></div>
            </div>
        </div>
    </div>
</section>