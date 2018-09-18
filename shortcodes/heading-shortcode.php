<?php

//Heading ShortCode
function marvel_heading_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'marvel_title' => '',              
        'marvel_sub_title' => '',              
        'marvel_sub_title_position' => '',              
                     
    ), $atts));
    
    $marvel_heading_section_markup = '
        <div class="heading-text wow fadeInDown">
            <h1 class="heading">'.$marvel_title.'</h1>
            <h2 style="left: '.$marvel_sub_title_position.'%;">'.$marvel_sub_title.'</h2>            
        </div>
    '; 

    
    return $marvel_heading_section_markup;
}
add_shortcode('marvel_heading', 'marvel_heading_shortcode');
?>