<?php

namespace AptoName\Controller\Front;

use AptoName\Controller\Ajax\AjaxController;
use AptoName\Interfaces\PublicInterface;
use AptoName\Traits\Core\Plugin;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.apto.gr/
 * @since      1.0.0
 *
 * @package    AptoName
 * @subpackage AptoName/Controller/Front
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    AptoName
 * @subpackage AptoName/Controller/Front
 * @author     APTO OE <info@apto.gr>
 */
class PublicController implements PublicInterface {

	use Plugin;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @param $pluginName
	 * @param $pluginDirUrl
	 *
	 * @since    1.0.0
	 */
	public function __construct( $pluginName, $pluginDirUrl ) {

		$this->pluginName       = $pluginName;
        $this->pluginDirUrl     = $pluginDirUrl;

	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueueStyles() {

		wp_enqueue_style( $this->getPluginName(), $this->getPluginDirUrl() . self::PUBLIC_CSS_FOLDER . 'public.min.css', array(), null, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueueScripts() {

		wp_enqueue_script( $this->getPluginName(), $this->getPluginDirUrl() . self::PUBLIC_JS_FOLDER . 'public.min.js', array( 'jquery' ), null, true );

        $ajaxController = new AjaxController();
        wp_localize_script(
            $this->getPluginName(),
            'AjaxController',
            array_merge( [
                'ajax_url'   => admin_url( 'admin-ajax.php' ),
                'security'   => wp_create_nonce( $this->getPluginName() ),
            ],
                $ajaxController->getJSAjaxActions()
            )
        );

	}



	/**
	 * Adds the plugin name to the classes of the body
	 * It helps overriding css rules
	 *
	 * @since     1.0.0
	 * @param     $classes array
	 * @return    array
	 */
	public function pluginNameBodyClass( $classes ){

		$classes[] = $this->getPluginName();

		return $classes;

	}

}
