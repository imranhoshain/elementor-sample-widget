<?php

//Custom post register function
function marvel_theme_custom_post()
{
    
    //Isoptop Custom Post
    register_post_type('portfolio-isotop', array(
        'label' => 'isotop',
        'labels' => array(
            'name' => 'Portfolios',
            'singular_name' => 'isotop'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-images-alt',
        'show_ui' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'excerpt'
        )
  
    ));
    
   
}
add_action('init', 'marvel_theme_custom_post');