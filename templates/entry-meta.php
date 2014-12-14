<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>

<div class="share-page">
    <i class="fa fa-facebook like_page"></i>

    <a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fa fa-pinterest pin_page"></i></a>

    <a class="tweet_page" target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>&via=theuglyvolvo&related=luzmcosta&text=<?php the_title(); ?>">
        <i class="fa fa-twitter"></i>
    </a>
</div>
