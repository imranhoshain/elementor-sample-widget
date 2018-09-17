<?php

//Heading ShortCode
function marvel_heading_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'heading_title' => '',               
                     
    ), $atts));
    
    $marvel_heading_section_markup = '
        <div class="heading-text wow fadeInDown">
            <h1 class="heading">About</h1>
            <h2>This is the one page polo</h2>
            <p>
                Molestie ultricies quam. Donec at sem. Praesent pretium. Maorbi quis nulla vehicula felsd laoreet. Sed ullamcorper arcu ente. Sed tempus tempor cild Nulla vierra ultrices magnal Nam rutrum congue diam. do eiusmod tempor incididunt ut dolore magna aliqua. Utdi eni ad minim veniam, quis nostrud exercitationconsequat. </p>
            <div class="about-info-btn">
                <a href="#">More info</a>
                <a href="#">Join Expreance</a>
            </div>
        </div>
    '; 

    
    return $marvel_heading_section_markup;
}
add_shortcode('marvel_heading', 'marvel_heading_shortcode');
?>