<?php


namespace AptoName\Includes;

use AptoName\Traits\Core\ClassList;

class Widgets {


    /**
     * Use the ClassList Trait in order to set the array
     * of the Classes that are defined inside the $folderDirPath
     *
     * @see \AptoName\Traits\Core\ClassList
     */
	use ClassList;


    /**
     * Widgets constructor.
     *
     * Sets the folder of the Widget Classes and calls the @see ClassList::setClasses()
     * to set the array of the Widget Classes available
     *
     * @param $pluginDirPath
     */
    public function __construct($pluginDirPath ) {

		$this->folderDirPath = $pluginDirPath. 'src/Widgets/';
		$this->setClasses();

	}



    /**
     * Loops through the Classes defined in the folder of @see $folderDirPath
     * For every class found it registers the Widget
     */
    public function registerWidgets(){

		if( is_array( $this->classes ) && !empty( $this->classes ) ) {

			foreach ( $this->classes as $widget ) {

				if ( class_exists( $widget ) ) {

					register_widget( $widget );

				}
				else {

                    var_dump( "Class: $widget is not defined in the $this->folderDirPath folder" );

				}

			}

		}

	}

}
