(function() {
    // Get elements and set
    var header = $( "header" ),
        searchForm = header.find( ".widget_search" ),
        searchIcon = header.find( "div.search" ),
        animation = {
            in: "fadeInDown",
            out: "fadeOutDown"
        };

    // On click of the search icon or label...
    searchIcon.off().click(function( event ) {
        // Prevent default event.
        event.preventDefault();

        // Set default values.
        var effect = animation.in,
            current = animation.out;

        // If el is visible, set fade effects accordingly.
        if ( searchForm.is( ":visible" ) ) {
            // Set effect that will be set on element.
            effect = animation.out;
            // Set effect that will be removed from element.
            current = animation.in;
        }

        // Set on el the animated class if not already set.
        if ( !searchForm.is( ".animated" ) ) {
            searchForm.addClass( "animated" );
        }

        // Remove current effect from el, and set new effect before toggling in/out.
        searchForm.removeClass( current ).addClass( effect ).fadeToggle();
    });

    /**
     * Set lightbox effect on images.
     */
    $( "img, a" ).nivoLightbox({ effect: "slideDown" });

    /**
     * Set grid layout.
     */
    var $container = $( ".home main" );

    // initialize Masonry after all images have loaded
    $container.imagesLoaded(function() {
        $container.masonry({
            columnWidth: "article",
            isFitWidth: true,
            itemSelector: "article, nav",
            gutter: 0,
            transitionDuration: "0.5s"
        });
    });

    /**
     * Loads Facebook's JavaScript SDK.
     */
    window.fbAsyncInit = function() {
        FB.init({
            appId: "700636043345419",
            cookie: true,
            status: true,
            xfbml: true,
            version: "v2.2"
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Set Share object.
    var Share = { facebook: {}, twitter: {} };

    /**
     * @constructor
     */
    Share.initialize = function() {
        /**
         * Set Facebook like event on UI element that likes the page.
         */
        $( ".like, .like_page" ).on( "click", this.facebook.share );

        /**
         * Set Twitter tweet event on UI element.
         */
        $( ".tweet_page" ).on( "click", this.twitter.page.bind( this ) );

        /**
         * Set Twitter event on UI element that shares the site.
         */
        $( ".retweet" ).on( "click", this.twitter.site.bind( this ) );

        /**
         * Set Facebook like event on UI element.
         */
        $( "#like_site" ).on( "click", this.like );

        /**
         * Render the Twitter widget's Follow button.
         */
         this.twitter.follow();
    };

    /**
     * Open a dialog.
     */
    Share.render = function( url, title ) {
        // Open tweet dialog.
        window.open( url, "Share " + title );
    };

    /**
     * Open a dialog for users to post the desired event to Twitter.
     */
    Share.url = function( endpoint, parameters ) {
        var params = [],
            query = "",
            url = "";

        $.each( parameters, function( key, param ) {
            params.push( key + "=" + param );
        });

        // Join the parameters.
        query = params.join( "&" );

        // Set parameters on endpoint as a query string.
        url = endpoint + "?" + query;

        return url;
    };

    /**
     * Post a share event to Facebook.
     */
    Share.facebook.share = function() {
        console.log( "Facebook %o", FB );
        FB.ui(
            {
                method: "share",
                href: window.location.href
            },
            function( response ) {
                console.log( "Facebook response is %o", response );

                // Handle error.

                // Handle success.
            }
        );
    };

    /**
     * POST a Like event.
     */
    Share.facebook.like = function() {
        console.log( "Facebook %o", FB );
        var body = 'Reading JS SDK documentation';
        FB.api('/me/feed', 'post', { message: body }, function(response) {
            if (!response || response.error) {
                console.log('Error occured');
            } else {
                console.log('Post ID: ' + response.id);
            }
        });
    };

    /**
     * Shares the current page on Twitter.
     */
    Share.twitter.page = function() {
        var endpoint = "https://twitter.com/share",
            title = document.title,
            $title = encodeURIComponent( title ),
            parameters = {
                text: $title,
                via: "theuglyvolvo",
                related: "luzmcosta",
                url: window.location.href
            },
            url = "";

        // Set parameters on endpoint.
        url = this.url( endpoint, parameters );

        // Open tweet dialog.
        this.render( url, parameters.title );

        return url;
    };

    /**
     * Share the site on Twitter.
     */
    Share.twitter.site = function() {
        var endpoint = "https://twitter.com/share",
            title = "The Ugly Volvo: Attempts at Adulthood",
            $title = encodeURIComponent( title ),
            parameters = {
                text: $title,
                via: "theuglyvolvo",
                related: "luzmcosta",
                url: "theuglyvolvo.com"
            },

        // Set parameters on endpoint.
        url = this.url( endpoint, parameters );

        // Open tweet dialog.
        this.render( url, parameters.title );

        return url;
    };

    /**
     * Set a Twitter Follow button on the footer's Twitter widget.
     */
    Share.twitter.follow = function() {
        var button = document.createElement( "button" ),
            link = document.createElement( "a" ),
            url = "https://twitter.com/intent/follow?screen_name=theuglyvolvo";

        // Set link on a tag.
        link.setAttribute( "href", url );

        // Set a tag's class.
        link.setAttribute( "class", "twitter-follow" );

        // Set link on view.
        $( ".widget_twitter_timeline" ).prepend( link );

        // Set button inside link.
        $( link ).append( button );

        // Set instructional text on button.
        $( button ).append( "Follow" );

        return true;
    };

    /**
     * Set the view.
     */
    Share.initialize();
})();
