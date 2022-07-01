<?php $var = $args['content'];
$footer_social_icons = get_field('footer_social_icons', 'option');
?>
<section class="big_socials_014 <?php if ($var['014_margin_topbottom']) {
                                    echo $var['014_margin_topbottom'];
                                } ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 content">
                <?php if ($var['014_title']) : ?>
                    <p>
                        <?= $var['014_title']; ?>
                        <?php if ($var['014_subtitle']) : ?>
                            <span>
                                <?= $var['014_subtitle']; ?>
                            </span>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="socials">
                    <?php foreach ($footer_social_icons as $social_link) { ?>
                        <?php if ($social_link['footer_social_type'] == 'linkedin') : ?>
                            <li class="social-icon linkedin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33.684" height="31.279" viewBox="0 0 33.684 31.279">
                                    <path id="Combined_Shape" data-name="Combined Shape" d="M27.268,32V20.34a3.21,3.21,0,1,0-6.416,0V32H14.436V20.34a9.814,9.814,0,0,1,9.624-9.995,9.814,9.814,0,0,1,9.625,9.995V32ZM0,32V12.752H7.218V32ZM0,4.331A3.609,3.609,0,1,1,3.609,7.94,3.607,3.607,0,0,1,0,4.331Z" transform="translate(0 -0.722)" fill="#00264e" />
                                </svg>

                                <a href="<?= $social_link['footer_social_link']; ?>">
                                    LinkedIn
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($social_link['footer_social_type'] == 'twitter') : ?>
                            <li class="social-icon twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39.234" height="32" viewBox="0 0 39.234 32">
                                    <path id="Stroke_1" data-name="Stroke 1" d="M39.234.018a19.477,19.477,0,0,1-5.6,2.729A7.99,7.99,0,0,0,19.617,8.1V9.88A19.009,19.009,0,0,1,3.567,1.8s-7.133,16.05,8.917,23.184A20.756,20.756,0,0,1,0,28.552c16.05,8.917,35.667,0,35.667-20.509a8.083,8.083,0,0,0-.143-1.48A13.761,13.761,0,0,0,39.234.018Z" fill="#00264e" />
                                </svg>
                                <a href="<?= $social_link['footer_social_link']; ?>">
                                    Twitter
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($social_link['footer_social_type'] == 'facebook') : ?>
                            <li class="social-icon facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.6" height="32" viewBox="0 0 17.6 32">
                                    <path id="Fill_1" data-name="Fill 1" d="M17.6,0H12.8a8,8,0,0,0-8,8v4.8H0v6.4H4.8V32h6.4V19.2H16l1.6-6.4H11.2V8a1.6,1.6,0,0,1,1.6-1.6h4.8Z" fill="#00264e" />
                                </svg>

                                <a href="<?= $social_link['footer_social_link'] ?>">
                                    Facebook
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>