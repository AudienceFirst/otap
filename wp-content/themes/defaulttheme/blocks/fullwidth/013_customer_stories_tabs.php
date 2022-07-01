<?php $var = $args['content'];
?>
<section class="customer_stories_tabs_013 <?php if($var['013_margin_topbottom']) { echo $var['013_margin_topbottom']; } ?>">
    <?php if($var['customer_stories_posts']) : ?> 
        <?php
        $customer_stories = array();
        foreach ($var['customer_stories_posts'] as $post) {
            $data = get_fields($post->ID);
            $data['image'] = get_the_post_thumbnail_url($post->ID);
            $data['title'] = get_the_title($post->ID);
            $data['url'] = get_permalink($post->ID);
            $data['active'] = false;
            array_push($customer_stories, $data);
        } 
        ?>
        <customer-stories-tabs stories='<?= json_encode($customer_stories); ?>'></customer-stories-tabs>
    <?php endif; ?> 
</section>

<!-- /scripts/components/CustomerStoriesTabs.vue -->