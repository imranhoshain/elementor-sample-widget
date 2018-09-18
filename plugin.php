<?php
namespace Marvel;

use Marvel\Widgets\Marvel_Heading;
use Marvel\Widgets\Marvel_About_Box;
use Marvel\Widgets\Marvel_Who_We_Are;
use Marvel\Widgets\Marvel_Feature_Box;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/heading.php';
		require __DIR__ . '/widgets/about-box.php';
		require __DIR__ . '/widgets/who-we-are.php';
		require __DIR__ . '/widgets/feature-item-box.php';
		
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Marvel_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Marvel_About_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Marvel_Who_We_Are() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Marvel_Feature_Box() );
		
	}
}

new Plugin();
