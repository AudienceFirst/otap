<?php $var = $args['content'];?>
<section class="single_content_03">
    <div class="container">
        <div class="row">
            <?php foreach($var['03_single_content_sections'] as $item) : ?>
                <div class="col-lg-12 col-md-12 col-sm-12 single-column-block">
                    <div class="column-wrapper">

                        <?php if($item['03_single_content_type'] == "image") :?>
                            <article class="full-width image">
                                <img src="<?= $item['03_single_image']['url'] ?>" alt="">
                            </article>
                        <?php endif; ?>

                        <?php if($item['03_single_content_type'] == "video") : ?>
                            <article class="full-width video">
                                <div class="video-container">
                                    <?php if($item['03_single_video_type'] == "youtube") { ?>
                                        <iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?= $item['03_single_video_youtube']; ?>"></iframe>
                                    <?php } ?>
                                    <?php if($item['03_single_video_type'] == "vimeo") { ?>
                                        <!-- Ahmad
                                        Need to put the vimeo iframe, veriable have value. -->
                                        <?= $item['03_single_video_vimeo']; ?>
                                    <?php } ?>
                                </div>
                            </article>
                        <?php endif; ?>
                        
                        <?php if($item['03_single_content_type'] == "contact") : ?>
                            <article class="content-block">
                                <?php if($item['03_single_contact_title']) { ?>
                                    <?php if($item['03_single_contact_title_type']) { ?>
                                        <?= "<" . $item['03_single_contact_title_type'] . " class='title'>" ?><?= $item['03_single_contact_title']; ?><?= "</" . $item['03_single_contact_title_type'] . ">" ?>
                                    <?php } else { ?>
                                        <h2><?= $item['03_single_contact_title']; ?></h2>
                                    <?php } ?>
                                <?php } ?>
                                <div class="textarea">
                                    <?= $item['03_single_contact_textarea']; ?>
                                </div>
                                <div class="contactform">
                                    <?php echo do_shortcode( $item['03_single_contact'] ); ?>
                                </div>
                            </article>
                        <?php endif; ?>
                        
                        <?php if($item['03_single_content_type'] == "contentblock") : ?>
                            <article class="content-block">
                            <?php if($item['03_single_content_block_title']) { ?>
                                <?php if($item['03_single_content_block_title_type']) { ?>
                                    <?= "<" . $item['03_single_content_block_title_type'] . " class='title'>" ?><?= $item['03_single_content_block_title']; ?><?= "</" . $item['03_single_content_block_title_type'] . ">" ?>
                                <?php } else { ?>
                                    <h2><?= $item['03_single_content_block_title']; ?></h2>
                                <?php } ?>
                            <?php } ?>
                                <div class="textarea">
                                    <?= $item['03_single_content_block_textarea']; ?>
                                </div>
                                <?php if($item['03_single_content_block_list']) : ?>
                                    <ul class="<?= $item['03_single_content_block_list_type']; ?>">
                                        <?php foreach($item['03_single_content_block_list'] as $list) : ?>
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
                                                <?= $list['03_single_content_block_list_link']['title']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                
                                <?php if($item['03_single_content_block_button']) : ?>
                                    <a class="btn ghost-btn" href="<?= $item['03_single_content_block_button']['url']; ?>"><span><?= $item['03_single_content_block_button']['title']; ?></span></a>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>
                    
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>