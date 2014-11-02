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
