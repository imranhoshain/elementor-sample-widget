<?php

//Heading ShortCode
function marvel_team_shortcode($atts)
{
    extract(shortcode_atts(array(        
        'id' => '',        
        'member_name' => '',              
        'member_position' => '',              
        'member_image' => '',              
        'member_hover_name' => '',              
        'member_hover_position' => '',              
        'member_hover_detail' => '',              
        'member_hover_socials' => '',              
        'social_link' => '',          

    ), $atts));
    

    
   ?>
        <div class="single-team">
            <div class="team-image">
                <img src="<?php echo $member_image['url']; ?>" alt="">
            </div>
            <div class="team-info">
                <h5>
                    <?php echo $member_name; ?>
                </h5>
                <h6><?php echo $member_position; ?></h6>
            </div>
            <?php if (($member_hover_name & $member_hover_position & $member_hover_detail) == true){ ?>
            <div class="team-hover">
                <h5>
                    <?php echo $member_hover_name; ?>
                </h5>
                <h6><?php echo $member_hover_position; ?></h6>
                <p>
                    <?php echo $member_hover_detail; ?>
                </p>
                <hr>
                <div class="social-info">
                   <?php foreach($member_hover_socials as $member_hover_social){ ?>  
                    <a href="<?php echo ($member_hover_social['social_link']); ?>"><i class="<?php echo $member_hover_social['social']; ?>" aria-hidden="true"></i></a>                                     
                     <?php } ?>
                </div>
            </div>
            <?php } ?>
            
        </div>
<?php
}
add_shortcode('marvel_team', 'marvel_team_shortcode');
?>