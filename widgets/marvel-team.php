<?php
namespace Marvel\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Marvel_Team extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'marvel-team';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Marvel Team', 'marvel-toolkit' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-team';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'marvel' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {		
  		
        // Content Controls       
        
        $this->start_controls_section(
			'marvel_team',
			[
				'label' => __( 'Marvel Team', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);        
        
        //Tab Section Start
		$this->start_controls_tabs( 'team_info_tab' );
		$this->start_controls_tab(
			'team_info',
			[
				'label' => __( 'Team Info', 'elementor' ),
			]
		);
        
        $this->add_control(
			'member_name',
			[
				'label' => esc_html_x("Member Name", 'Admin Panel','marvel-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Robert Willsom", 'Admin Panel','marvel-toolkit'),			
			]
		); 
        
         $this->add_control(
			'member_position',
			[
				'label' => esc_html_x("Member Position", 'Admin Panel','marvel-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("web developer", 'Admin Panel','marvel-toolkit'),			
			]
		); 
        
        $this->add_control(
			'member_image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],				
			]
		);
        

		$this->end_controls_tab();
        

		$this->start_controls_tab(
			'team_hover_info',
			[
				'label' => __( 'Team Hover Info', 'elementor' ),
			]
		);
        
        
        $this->add_control(
			'member_hover_name',
			[
				'label' => esc_html_x("Member Hover Name", 'Admin Panel','marvel-toolkit'),
				'type' => Controls_Manager::TEXT,							
			]
		); 
        
         $this->add_control(
			'member_hover_position',
			[
				'label' => esc_html_x("Member Hover Position", 'Admin Panel','marvel-toolkit'),
				'type' => Controls_Manager::TEXT,							
			]
		); 
        
         $this->add_control(
			'member_hover_detail',
			[
				'label' => esc_html_x("Member Hover Detail", 'Admin Panel','marvel-toolkit'),
				'type' => Controls_Manager::TEXTAREA,							
			]
		); 
        
        $this->add_control(
			'member_hover_socials',
			[
				'label' => __( 'Social Icons', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'social' => 'fa fa-facebook',
					],					
				],
				'fields' => [
					[
						'name' => 'social',
						'label' => __( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
												
					],
					[
						'name' => 'social_link',
						'label' => __( 'Enter social link', 'finance-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'finance-toolkit' ),
					],
				],				
			]
		);
        
		$this->end_controls_tab();
		$this->end_controls_tabs();
        //Tab Section End
		
		$this->end_controls_section();
        
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render( ) {
        
		$settings = $this->get_settings();             

    echo marvel_team_shortcode ($settings);            


	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function content_template() {
        
	}
    
}
