<?php
/* Template Name: Galleries */
?>

<div id="primary" class="site-content gallery">
    <div id="content" role="main">

        <ul>
            <?php
                // Set path to images.
                $root = get_bloginfo('template_directory');
                $path = $root . '/assets/img/fences/';

                // Set img element's open and closing tags.
                $img_close = ' />';
                $img_open = '<img';

                // Set list items' open and closing tags.
                $li_open = '<li>';
                $li_close = '</li>';

                // Set list items' open and closing tags.
                $div_open = '<div>';
                $div_close = '</div>';

                // Reference each image in an array.
                $fences = array(
                    "Henry Burroughs" => "fence_Henry_Burroughs.jpg",
                    "Simon Harrod" => "fence_Simon_Harrod.jpg",
                    "Horia Varlan" => "fence_Horia_Varlan.jpg",
                    "VagabondTravels" => "fence_VagabondTravels.jpg",
                    "Robert Nunnally" => "fence_Robert_Nunnally.jpg",
                    "Aaron Smith" => "fence_Aaron_Smith.jpg",
                    "Ryan Hyde" => "fence_Ryan_Hyde.jpg",
                    "Jo Naylor" => "fence_Jo_Naylor.jpg",
                    "Don Graham" => "fence_Don_Graham.jpg",
                    "DerRabe" => "fence_DerRabe.jpg",
                    "fauxto digit" => "fence_fauxto_digit.jpg",
                    "Andrew Foggs" => "fence_Andrew_Foggs.jpg",
                    "Bob Mical" => "fence_Bob_Mical.jpg",
                    "m01229" => "fence_m01229.jpg",
                    "UFORA" => "fence_UFORA.jpg",
                    "Toby Oxborrow" => "fence_Toby_Oxborrow.jpg",
                    "See One, Do One, Teach One" => "fence_see1_do1_teach1.jpg",
                    "Damian Gadal" => "fence_Damian_Gadal.jpg"
                );

                foreach($fences as $name => $fence) {
                    // Open the list item element.
                    echo $li_open;

                    // Close the div.
                    echo $div_open;

                    // Open the image element.
                    echo $img_open;

                    // Set the alt attribute.
                    echo ' alt="' . $name . '"';

                    // Set the src attribute.
                    echo ' src="' . $path . $fence . '"';

                    // Close the image element.
                    echo $img_close;

                    // Set the image caption.
                    echo '<figcaption>Photo Credit: ' . $name . '</figcaption>';

                    // Close the div.
                    echo $div_close;

                    // Close the list item element.
                    echo $li_close;
                }
            ?>
        </ul>

    </div><!-- #content -->
</div><!-- #primary -->
