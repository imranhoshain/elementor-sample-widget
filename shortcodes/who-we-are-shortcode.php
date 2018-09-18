<?php

//Heading ShortCode
function marvel_who_we_are_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'who_we_are_logo' => '',             
        'who_we_are_title' => '',             
        'who_we_are_detail' => '',          
    ), $atts));   
    
    $marvel_who_we_are_section_markup = '
        <div class="we-are-content">
            <div class="logo">
                <img src="'.$who_we_are_logo['url'].'" alt="image">
            </div>
            <h2>'.$who_we_are_title.'</h2>
            <p>'.$who_we_are_detail.'</p>           
        </div>
    '; 
  
    return $marvel_who_we_are_section_markup ;
}
add_shortcode('who_we_are', 'marvel_who_we_are_shortcode');
?>