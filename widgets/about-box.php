<?php
namespace Marvel\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Marvel_About_Box extends Widget_Base {

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
		return 'marvel-about-box';
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
		return __( 'Marvel About Section', 'marvel-toolkit' );
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
		return 'fa fa-newspaper-o';
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
  			'marvel_about_box',
  			[
  				'label' => esc_html_x( 'About Box','Admin Panel','marvel-toolkit' )
  			]
  		); 
 
		$this->add_control(
			'ab_condition',
			[
				'label' => __( 'Select Option', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'elementor' ),					
					'image' => __( 'Image Box', 'elementor' ),					
				],				
			]
		);       
        
        $this->add_control(
			'about_box_icon',
			[
				'label' => __( 'Select Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => [
					'default' => 'fa fa-star',
				],
				'condition' => [
					'ab_condition' => 'default',
					
				],
				
			]
		);
        

		$this->add_control(
			'about_box_image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'ab_condition' => 'image',				
					
				],
				
			]
		);
        
        $this->add_control(
			'about_box_title',
			[
				'label' => esc_html_x("ABout Box Title", 'Admin Panel','marvel-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Awesome Features", 'Admin Panel','marvel-toolkit'),			
			]
		); 
        
        $this->add_control(
			'about_box_detail',
			[
				'label' => 'About Box Detail',
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elitelquam. Fusce quis nulla tincidunt interdum magna vitae.', 'elementor' ),
			]
		);

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

    echo marvel_about_box_shortcode ($settings);            


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
