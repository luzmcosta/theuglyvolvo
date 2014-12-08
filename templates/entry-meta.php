<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>

<div class="share-page">
    <i class="fa fa-facebook like_page"></i>

    <a class="tweet_page" target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>&via=theuglyvolvo&related=luzmcosta&text=<?php the_title(); ?>">
        <i class="fa fa-twitter"></i>
    </a>
</div>
