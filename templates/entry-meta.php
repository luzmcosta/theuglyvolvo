<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>

<div class="share-page">
    <a class="fb-like" title="Like on Facebook" href="http://www.facebook.com/dialog/feed?app_id=700636043345419&display=popup&caption=<?php echo htmlentities(the_title()); ?>&link=<?php echo the_permalink(); ?>&redirect_uri=https://developers.facebook.com/tools/explorer" target="_blank">
        <i class="fa fa-facebook"></i>
    </a>

    <a class="twitter-share" target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>&via=theuglyvolvo&related=luzmcosta&text=<?php the_title(); ?>">
        <i class="fa fa-twitter"></i>
    </a>
</div>
