<?php

namespace AptoName\Traits;

use AptoName\Controller\Ajax\AjaxController;
use AptoName\Controller\Admin\AdminController;
use AptoName\Controller\Front\PublicController;
use AptoName\Includes\PageTemplates;
use AptoName\Includes\Shortcodes;
use AptoName\Includes\Widgets;
use AptoName\Includes\Settings;
use AptoName\Includes\AdminMenuPages;
use AptoName\Includes\CronJobs;
use AptoName\Service\PostType\BoilerplatePost;
use AptoName\Service\User\UserCapabilities;
use AptoName\Service\User\UserRoles;

Trait Hooks {


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function defineAdminHooks() {

        /**
         * AdminController
         *
         * Functions Hooked:
         * @see AdminMenuPages::enqueueStyles()
         * @see AdminMenuPages::enqueueScripts()
         */
        $adminController = new AdminController( $this->getPluginName(), $this->getPluginDirUrl() );
        $this->loader->addAction( 'admin_enqueue_scripts', $adminController, 'enqueueStyles' );
        $this->loader->addAction( 'admin_enqueue_scripts', $adminController, 'enqueueScripts' );



        /**
         * AdminMenuPages
         *
         * Functions Hooked:
         * @see AdminMenuPages::registerAdminPages()
         */
        $adminPages = new AdminMenuPages( $this->getPluginDirPath() );
        $this->loader->addAction( 'admin_menu', $adminPages, 'registerAdminPages' );



        /**
         * Settings
         *
         * Functions Hooked:
         * @see Settings::init()
         * @see Settings::addSettingsMenu()
         * @see Settings::addSettingsLink()
         */
//        $settings = new Settings( $this->getPluginName() );
//        $this->loader->addAction( 'admin_init', $settings, 'init' );
//        $this->loader->addAction( 'admin_menu', $settings, 'addSettingsMenu' );
//        $this->loader->addFilter( 'plugin_action_links' , $settings, 'addSettingsLink', 10, 4 );



        /**
         * Cron Jobs
         *
         * Functions Hooked:
         * @see CronJobs::registerScheduledEvents()
         */
//        $cronJobs = new CronJobs( $this->loader );
//        $this->loader->addAction( 'init', $cronJobs, 'registerScheduledEvents');
//        $cronJobs->addCallbackHooks();

        /**
         * User Roles
         *
         * Functions Hooked:
         * @see UserRoles::registerUserRoles()
         */
//        $userRoles = new UserRoles();
//        $this->loader->addAction( 'init', $userRoles, 'registerUserRoles');



        /**
         * User Capabilities
         *
         * Functions Hooked:
         * @see UserCapabilities::registerUserCapabilities()
         */
//        $userCapabilities = new UserCapabilities();
//        $this->loader->addAction( 'init', $userCapabilities, 'registerUserCapabilities');


	}


	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function definePublicHooks() {

        /**
         * PublicController
         *
         * Functions Hooked:
         * @see PublicController::enqueueStyles()
         * @see PublicController::enqueueScripts()
         * @see PublicController::pluginNameBodyClass()
         */
        $publicController = new PublicController( $this->getPluginName(), $this->getPluginDirUrl() );
        $this->loader->addAction( 'wp_enqueue_scripts', $publicController, 'enqueueStyles' );
        $this->loader->addAction( 'wp_enqueue_scripts', $publicController, 'enqueueScripts' );
        $this->loader->addFilter( 'body_class', $publicController, 'pluginNameBodyClass' );



        /**
         * PageTemplates
         *
         * Functions Hooked:
         * @see PageTemplates::addNewTemplate()
         * @see PageTemplates::registerTemplates()
         * @see PageTemplates::includeTemplates()
         */
//        $pageTemplates = new PageTemplates( $this->getPluginDirPath() );
//        $this->loader->addFilter( $pageTemplates->getPageTemplatesFilter(), $pageTemplates, 'addNewTemplate' );
//        $this->loader->addFilter( 'wp_insert_post_data', $pageTemplates, 'registerTemplates' );
//        $this->loader->addFilter( 'template_include', $pageTemplates, 'includeTemplates' );


        /**
         * Shortcodes
         *
         * Functions Hooked:
         * @see Shortcodes::registerShortcodes()
         */
//        $shortcodes = new Shortcodes( $this->getPluginDirPath() );
//        $this->loader->addAction( 'init', $shortcodes, 'registerShortcodes' );


        /**
         * Widgets
         *
         * Functions Hooked:
         * @see Widgets::registerWidgets()
         */
//        $widgets = new Widgets( $this->getPluginDirPath() );
//        $this->loader->addAction( 'widgets_init', $widgets, 'registerWidgets' );


        /**
         * Boilerplate Post hooks
         *
         * Functions Hooked:
         * @see BoilerplatePost::registerPostType()
         * @see BoilerplatePost::addMetaBoxes()
         * @see BoilerplatePost::customPostTypeTemplateSingle()
         * @see BoilerplatePost::customPostTypeTemplateArchive()
         */
//        $boilerplatePost = new BoilerplatePost( $this->getPluginName(), $this->getPluginDirPath() );
//        $this->loader->addAction( 'init', $boilerplatePost, 'registerPostType' );
//        $this->loader->addAction( 'rwmb_meta_boxes', $boilerplatePost, 'addMetaBoxes', 33, 1 );
//        $this->loader->addFilter( 'single_template', $boilerplatePost,'customPostTypeTemplateSingle', 10, 1 );
//        $this->loader->addFilter( 'archive_template', $boilerplatePost,'customPostTypeTemplateArchive' );

        /**
         * Ajax Controller
         *
         * Functions Hooked:
         * @see AjaxController
         */
        $ajaxController = new AjaxController();

        foreach( AjaxController::AJAX_ACTIONS as $ajaxAction => $ajaxData ){

            if( isset( $ajaxData['callback'] ) && method_exists( $ajaxController, $ajaxData['callback'] ) ){

                $this->loader->addAction( "wp_ajax_$ajaxAction", $ajaxController, $ajaxData['callback'] );

                if( $ajaxData['nopriv'] === true ){
                    $this->loader->addAction( "wp_ajax_nopriv_$ajaxAction", $ajaxController, $ajaxData['callback'] );
                }

            }

        }

	}

}
