<?php

// Isotop Taxonomy OR Catagory
function marvel_isotop_taxonomy()
	{
	register_taxonomy('portfolio_cat', 'portfolio-isotop', //Your Post type here
	array(
		'hierarchical' => true,
		'label' => 'Portfolio Category',
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array(
			'slug' => 'portfolio-category',
			'with_front' => true
		)
	));
	}

add_action('init', 'marvel_isotop_taxonomy');

// isotop ShortCode
function marvel_portfolio_shortcode($atts, $content = null)
	{
	extract(shortcode_atts(array(
		'id' => '',
		'lsit_bgcolor' => '',
		'item_bg_color' => ''
	) , $atts));
	$isotop_categories = get_terms('portfolio_cat');
	$dynamic_isotop = rand(630439, 630440);
	$marvel_isotop_markup = ' 
    <script>
        
        jQuery(document).ready(function($) {        
        var $portfolio = $(".portfolios' . $dynamic_isotop . '");       
        $portfolio.isotope({
            itemSelector: ".col-md-3",
            layoutMode: "masonry",
            filter: "*",
            percentPosition: true,
            animationOptions: {
                duration: 750,
                easing: "linear",
                queue: false,
            }
        });

        $(".portfolio-menu li").on("click", function () {
            $(".portfolio-menu li").removeClass("active");
            $(this).addClass("active");
            var selector = $(this).attr("data-filter");
            $portfolio.isotope({
                filter: selector,
            });
        });
        
        });
    
    </script>';
	$marvel_isotop_markup.= ' 
    <div id="portfolio" class="portfolio-area">
        <div class="portfolio-list section-pb" style="background:' . $lsit_bgcolor . '">
            <div class="container">                
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="portfolio-menu">
                            <ul>
                                <li class="active" data-filter="*"><i class="fa fa-th" aria-hidden="true"></i></li>';
	if (!empty($isotop_categories) && !is_wp_error($isotop_categories))
		{
		foreach($isotop_categories as $isotop_category)
			{
			$marvel_isotop_markup.= '<li data-filter=".' . $isotop_category->slug . '">' . $isotop_category->name . '</li>';
			}
		}
	$marvel_isotop_markup.= ' </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-item overfollow-area" style="background:' . $item_bg_color . '">
            <div class="row portfolios' . $dynamic_isotop . '">';
	$isotop_query = new WP_Query(array(
		'post_type' => 'portfolio-isotop',
		'posts_per_page' => - 1
	));
	while ($isotop_query->have_posts()):
		$isotop_query->the_post();
		$isotop_category = get_the_terms(get_the_ID() , 'portfolio_cat');
		if (!empty($isotop_category) && !is_wp_error($isotop_category))
			{
			$project_cat_list = array();
			foreach($isotop_category as $Single_isotop_category)
				{
				$project_cat_list[] = $Single_isotop_category->slug;
				}

			$isotop_assigned_cat = join(" ", $project_cat_list);
			}
		  else
			{
			$isotop_assigned_cat = '';
			}
		$marvel_isotop_markup.= ' 
                <div class="col-md-3 ' . $isotop_assigned_cat . '">
                    <div class="single-portfolio wow zoomIn">
                        <div class="portfolio-image">
                            <img src="' . get_the_post_thumbnail_url(get_the_ID()) . '" alt="">
                        </div>
                        <div class="portfolio-hover">
                            <h6>' . get_the_title() . '</h6>
                            <div class="hover-link">
                                <a href="' . get_the_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a>
                                <a class="gallery-lightbox" href="' . get_the_post_thumbnail_url(get_the_ID()) . '"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
	endwhile;
	wp_reset_query();
	$marvel_isotop_markup.= '    
            </div>
        </div>
    </div>
    ';
	return $marvel_isotop_markup;
	}

add_shortcode('marvel_portfolio', 'marvel_portfolio_shortcode');

