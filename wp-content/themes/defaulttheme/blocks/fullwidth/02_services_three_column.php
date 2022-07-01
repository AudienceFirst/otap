<?php $var = $args['content']; ?>
<section class="services-three-block <?php if ($var['02_padding_topbottom']) {
                                            echo $var['02_padding_topbottom'];
                                        } ?>">
    <div class="container">
        <div class="row">
            <?php if ($var['02_title']) { ?>
                <div class="col-lg-9 col-md-12 col-sm-12 title-area">
                    <?php if ($var['02_title_type']) { ?>
                        <?= "<" . $var['02_title_type'] . ">" ?><?= $var['02_title']; ?><?= "</" . $var['02_title_type'] . ">" ?>
                    <?php } else { ?>
                        <h2><?= $var['02_title']; ?></h2>
                    <?php } ?>
                    <?php if ($var['02_textarea']) { ?>
                        <p class="subtitle"><?= $var['02_textarea']; ?></p>
                    <?php } ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <!-- EMPTY SPACE -->
                </div>
            <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <?php foreach ($var['02_service'] as $service) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 service-card">
                            <?php if ($service['02_service_image']) { ?>
                                <img src="<?= $service['02_service_image']['url']; ?>" alt="<?= $service['02_service_image']['alt']; ?>" />
                            <?php } ?>
                            <?php if ($service['02_service_title']) { ?>
                                <h2 class="service-title"><?= $service['02_service_title']; ?></h2>
                            <?php } ?>
                            <?php if ($service['02_service_desc']) { ?>
                                <div class="service-desc"><?= $service['02_service_desc']; ?></div>
                            <?php } ?>
                            <?php if ($service['02_service_button']) { ?>
                                <a href="<?= $service['02_service_button']['url'] ?>" class="btn btn-icon" role="button" value="<?= $service['02_service_button']['title']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <circle id="Oval" cx="8" cy="8" r="8" fill="#005ae6" />
                                        <g id="icon_24x24_wit_chevron-down" data-name="icon/24x24/wit/chevron-down" transform="translate(3 13) rotate(-90)">
                                            <g id="icon_24x24_wit_chevron-down_copy" data-name="icon/24x24/wit/chevron-down copy">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M0,0,3,3,6,0" transform="translate(2 3.5)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" />
                                            </g>
                                        </g>
                                    </svg>
                                    <span><?= $service['02_service_button']['title']; ?></span>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>