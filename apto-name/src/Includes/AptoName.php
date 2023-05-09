<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.apto.gr/
 * @since      1.0.0
 *
 * @package    AptoName
 * @subpackage AptoName/Includes
 */

namespace AptoName\Includes;

use AptoName\Traits\Hooks;
use AptoName\Interfaces\PluginInterface;
use AptoName\Traits\Core\Plugin;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    AptoName
 * @subpackage AptoName/Includes
 * @author     APTO OE <info@apto.gr>
 */
class AptoName implements PluginInterface {

	use Plugin;
	use Hooks;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->version          = ( defined( 'APTONAME_VERSION' ) ? APTONAME_VERSION : self::PLUGIN_VERSION );
		$this->pluginName       = self::PLUGIN_NAME;
		$this->pluginDirPath    = plugin_dir_path( dirname( __DIR__ ) );
        $this->pluginDirUrl     = plugin_dir_url( dirname( __DIR__ ) );
        $this->loader           = new Loader();

		$this->setLocale();
		$this->defineAdminHooks();
		$this->definePublicHooks();

	}



	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the @see \AptoName\Includes\I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function setLocale() {

		$translator = new I18n();
		$this->loader->addAction( 'plugins_loaded', $translator, 'loadTextDomain' );

	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->loader->run();

	}

}
