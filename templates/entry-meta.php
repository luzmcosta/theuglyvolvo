<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>

<div class="share-page">
    <i class="fa fa-facebook like_page"></i>

    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo get_image_url(); ?>&amp;description=<?php the_title() ?>"
        target="_blank"
        count-layout="none"
    >
        <i class="fa fa-pinterest pin_page"></i>
    </a>

    <a class="tweet_page" target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>&via=theuglyvolvo&related=luzmcosta,charlesbivona&text=<?php the_title(); ?>">
        <i class="fa fa-twitter"></i>
    </a>

    <div class="share-count">
        <?php echo share_count(get_permalink()); ?>
        <span>Shares</span>
    </div>
</div>
