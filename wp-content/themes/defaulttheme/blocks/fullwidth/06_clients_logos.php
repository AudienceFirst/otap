<?php $var = $args['content']; ?> 
<section class="clients-logos <?php if($var['06_padding_topbottom']) { echo $var['06_padding_topbottom']; } ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                <?php if($var['06_title']) { ?>
                    <?php if($var['06_title_type']) { ?>
                        <?= "<" . $var['06_title_type'] . ">" ?><?= $var['06_title']; ?><?= "</" . $var['06_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['06_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['06_textarea']) { ?>
                    <div class="textarea"><?= $var['06_textarea']; ?></div>
                <?php } ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <?php foreach($var['06_clients_column'] as $clients) { ?>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <?php if($clients['06_client_image']) { ?>
                                <img src="<?= $clients['06_client_image']['url']; ?>" alt="<?= $clients['06_client_image']['alt']; ?>"/>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</section>