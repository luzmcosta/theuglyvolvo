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

/**
 * Set Facebook like event on UI element.
 */
$( ".fa-facebook" ).on( "click", function() {
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
});
