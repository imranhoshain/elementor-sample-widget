<?php

//Heading ShortCode
function marvel_feature_box_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',  
        'ab_condition' => '',      
        'feature_icon' => '',      
        'feature_title' => '',      
        'feature_detail' => '', 
        
    ), $atts));   

   if ($ab_condition == 'default') {?>
    
   <div class="feature-item elementor-text-editor">
        <div class="feature-icon">
            <i class="<?php echo $feature_icon;?>" aria-hidden="true"></i>
        </div>
        <h5><?php echo $feature_title;?></h5>
        <p><?php echo $feature_detail;?></p>
    </div>
    
    <?php } elseif ($ab_condition == 'creative'){   ?>
    
   <div class="creative-box elementor-text-editor">
        <div class="creative-icon">
            <i class="<?php echo $feature_icon;?>" aria-hidden="true"></i>
        </div>
        <div class="creative-text">
            <h5><?php echo $feature_title;?></h5>
        <p><?php echo $feature_detail;?></p>
        </div>
    </div>
    
  <?php }     
       

}
add_shortcode('creative_feature_box', 'marvel_feature_box_shortcode');
?>