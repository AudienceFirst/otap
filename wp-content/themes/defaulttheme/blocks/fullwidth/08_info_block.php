<?php $var = $args['content'];?>
<section class="info_block_08 <?php if($var['08_padding_topbottom']) { echo $var['08_padding_topbottom']; } ?>">
    <div class="container">
        <div class="row top-part">
            <div class="col-lg-1 col-md-1 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <?php if($var['08_title']) { ?>
                    <?php if($var['08_title_type']) { ?>
                        <?= "<" . $var['08_title_type'] . ">" ?><?= $var['08_title']; ?><?= "</" . $var['08_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['08_title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if($var['08_textarea']) { ?>
                    <p class="subtitle"><?= $var['08_textarea']; ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
        </div>
        <div class="row bottom-part">
            <div class="col-lg-1 col-md-12 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <?php if($var['08_left_text']) { ?>
                    <h3><?= $var['08_left_text']; ?></h3>
                <?php } ?>
            </div>
            <div class="col-lg-1 col-md-12 col-sm-12 empty-space">
                <!-- EMPTY SPACE -->
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="bullet-listing">
                    <?php foreach($var['08_right_block_list'] as $list) { ?>
                        <?php if($list['08_right_block_list_bullet']) { ?>
                            <li>
                                <svg width="20px" height="16px" viewBox="0 0 20 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="" transform="translate(-730.000000, -1735.000000)" fill="#005AE6" fill-rule="nonzero">
                                            <g id="" transform="translate(205.000000, 1726.200000)">
                                                <g id="" transform="translate(525.000000, 1.800000)">
                                                    <polygon id="Path" points="6.84705882 17.0893099 0 17.0893099 0.988235294 13.0405954 7.83529412 13.0405954 9.36470588 7 14.4470588 7 12.9411765 13.0405954 20 13.0405954 19.0117647 17.1109608 11.9529412 17.1109608 10.4705882 23 5.38823529 23"></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <?= $list['08_right_block_list_bullet']; ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12">
                <!-- EMPTY SPACE -->
            </div>
        </div>
    </div>
</section>