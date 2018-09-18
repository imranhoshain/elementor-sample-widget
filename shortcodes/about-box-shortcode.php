<?php

//Heading ShortCode
function marvel_about_box_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'about_box_icon' => '',              
        'about_box_image' => '',              
        'about_box_title' => '',              
        'about_box_detail' => '',              
                     
    ), $atts));    
    
    

    $marvel_about_box_section_markup = '
        <div class="about-box text-center">
            <i class="'.$about_box_icon.'" aria-hidden="true"></i>
            <img src="'.$about_box_image['url'].'" alt="">
            <h4>'.$about_box_title.'</h4>
            <p>'.$about_box_detail.'</p>
        </div>
    '; 
  
    return $marvel_about_box_section_markup ;
}
add_shortcode('marvel_about_box', 'marvel_about_box_shortcode');
?>